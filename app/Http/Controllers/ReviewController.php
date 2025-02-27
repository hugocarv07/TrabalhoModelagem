<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Listar contribuintes elegíveis para avaliação (após aceitar pedidos)
    public function contributorList()
    {
        $user = Auth::user();

        if ($user->is_contributor) {
            // Contribuidor pode avaliar usuários que aceitaram sua proposta
            $contributors = User::whereHas('productRequests', function ($query) use ($user) {
                $query->whereHas('orderProposals', function ($subQuery) use ($user) {
                    $subQuery->where('contributor_id', $user->id)
                             ->where('status', 'accepted');
                });
            })->get();
        } else {
            // Usuário pode avaliar contribuidores que enviaram propostas aceitas por ele
            $contributors = User::whereHas('orderProposals', function ($query) use ($user) {
                $query->where('status', 'accepted')
                      ->whereHas('productRequest', function ($subQuery) use ($user) {
                          $subQuery->where('user_id', $user->id);
                      });
            })->get();
        }

        return view('pages.reviews.list', compact('contributors'));
    }
    
    // Formulário de Avaliação - só acessível se já houver uma proposta concluída
    public function create($userId)
    {
        $user = Auth::user();
        $target = null;
    
        if ($user->is_contributor) {
            // Se o usuário logado for contribuidor, ele pode avaliar o comprador (dono do pedido)
            $target = User::whereHas('productRequests', function ($query) use ($user) {
                $query->where('status', 'completed')
                      ->whereHas('orderProposals', function ($subQuery) use ($user) {
                          $subQuery->where('contributor_id', $user->id)
                                   ->where('status', 'completed');
                      });
            })->find($userId);
        } else {
            // Se o usuário logado for comprador, ele pode avaliar o contribuidor (vendedor)
            $target = User::whereHas('orderProposals', function ($query) use ($user) {
                $query->where('status', 'completed')
                      ->whereHas('productRequest', function ($subQuery) use ($user) {
                          $subQuery->where('user_id', $user->id);
                      });
            })->find($userId);
        }
    
        // Se não encontrar uma relação de proposta concluída, redireciona com mensagem de erro
        if (!$target) {
            return redirect()->route('reviews.list')
                ->with('error', 'Você só pode avaliar se já tiver tido uma proposta concluída com este usuário.');
        }
    
        // Passa a variável com o nome "contributor" para a view
        return view('pages.reviews.create', ['contributor' => $target]);
    }
    
    // Salvar a Avaliação
    public function store(Request $request)
    {
        $request->validate([
            'contributor_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);
    
        $user = Auth::user();
        $contributor = User::findOrFail($request->contributor_id);
    
        // Verifica se o usuário e o avaliado já tiveram uma proposta concluída
        if ($user->is_contributor) {
            // Contribuidor avalia o comprador
            $hasValidOrder = ProductRequest::whereHas('orderProposals', function ($query) use ($user) {
                $query->where('contributor_id', $user->id)
                      ->where('status', 'completed');
            })
            ->where('user_id', $request->contributor_id)
            ->where('status', 'completed')
            ->exists();
        } else {
            // Comprador avalia o contribuidor
            $hasValidOrder = ProductRequest::where('user_id', $user->id)
                ->whereHas('orderProposals', function ($query) use ($contributor) {
                    $query->where('contributor_id', $contributor->id)
                          ->where('status', 'completed');
                })
                ->where('status', 'completed')
                ->exists();
        }
    
        if (!$hasValidOrder) {
            return redirect()->route('reviews.list')
                ->with('error', 'Você só pode avaliar se já tiver tido uma proposta concluída com este usuário.');
        }
    
        // Verifica se já existe uma avaliação para essa relação
        $alreadyReviewed = Review::where([
            'user_id' => $user->id,
            'contributor_id' => $request->contributor_id
        ])->exists();
    
        if ($alreadyReviewed) {
            return redirect()->route('reviews.list')
                ->with('error', 'Você já avaliou essa pessoa.');
        }
    
        // Cria a avaliação
        Review::create([
            'user_id' => $user->id,
            'contributor_id' => $request->contributor_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
    
        return redirect()->route('reviews.list')
            ->with('success', 'Avaliação enviada com sucesso!');
    }
}
