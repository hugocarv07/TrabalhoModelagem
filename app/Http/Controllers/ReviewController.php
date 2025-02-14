<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // 🔹 Listar contribuintes elegíveis para avaliação (após aceitar pedidos)
    public function contributorList()
    {
        $user = Auth::user();
    
        if ($user->is_contributor) {
            // 🔹 Contribuidor só pode avaliar usuários que aceitaram sua proposta
            $contributors = User::whereHas('productRequests', function ($query) use ($user) {
                $query->whereHas('orderProposals', function ($subQuery) use ($user) {
                    $subQuery->where('contributor_id', $user->id)->where('status', 'accepted');
                });
            })->get();
        } else {
            // 🔹 Usuário só pode avaliar contribuidores que enviaram propostas aceitas por ele
            $contributors = User::whereHas('orderProposals', function ($query) use ($user) {
                $query->where('status', 'accepted')->whereHas('productRequest', function ($subQuery) use ($user) {
                    $subQuery->where('user_id', $user->id);
                });
            })->get();
        }
    
        return view('pages.reviews.list', compact('contributors'));
    }
    

    

    // 🔹 Formulário de Avaliação
    public function create($contributorId)
    {
        $user = Auth::user();

        // 🔹 Garantir que o colaborador pode ser avaliado
        $contributor = User::whereHas('completedOrders', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orWhereHas('pendingOrders', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->findOrFail($contributorId);

        return view('pages.reviews.create', compact('contributor'));
    }

    // 🔹 Salvar a Avaliação
    public function store(Request $request)
{
    $request->validate([
        'contributor_id' => 'required|exists:users,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:500',
    ]);

    $user = Auth::user();
    $contributor = User::findOrFail($request->contributor_id);

    // Verifica se o usuário logado é um contribuidor ou um solicitante de pedidos
    if ($user->is_contributor) {
        // 🔹 Contribuidor só pode avaliar um usuário que solicitou um produto e aprovou sua proposta
        $hasValidOrder = ProductRequest::whereHas('orderProposals', function ($query) use ($user) {
            $query->where('contributor_id', $user->id)->where('status', 'accepted');
        })
        ->where('user_id', $request->contributor_id)
        ->where('status', 'in_progress')
        ->exists();
    } else {
        // 🔹 Usuário só pode avaliar um contribuidor que enviou uma proposta aceita por ele
        $hasValidOrder = ProductRequest::where('user_id', $user->id)
            ->whereHas('orderProposals', function ($query) use ($contributor) {
                $query->where('contributor_id', $contributor->id)->where('status', 'accepted');
            })
            ->where('status', 'in_progress')
            ->exists();
    }

    if (!$hasValidOrder) {
        return redirect()->route('reviews.list')->with('error', 'Você só pode avaliar usuários com quem teve um pedido aprovado.');
    }

    // 🔹 Verifica se já existe uma avaliação para esta relação de pedido
    $alreadyReviewed = Review::where([
        'user_id' => $user->id,
        'contributor_id' => $request->contributor_id
    ])->exists();

    if ($alreadyReviewed) {
        return redirect()->route('reviews.list')->with('error', 'Você já avaliou essa pessoa.');
    }

    // 🔹 Criar a avaliação
    Review::create([
        'user_id' => $user->id,
        'contributor_id' => $request->contributor_id,
        'rating' => $request->rating,
        'comment' => $request->comment
    ]);

    return redirect()->route('reviews.list')->with('success', 'Avaliação enviada com sucesso!');
}

}
