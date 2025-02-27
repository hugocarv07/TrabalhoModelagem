<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProposal;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class OrderProposalController extends Controller
{
    // 🔹 Enviar uma proposta para um pedido
    public function store(Request $request, $productRequestId)
{
    $request->validate([
        'phone' => 'required|string|max:20',
        'message' => 'required|string|max:500'
    ]);

    $productRequest = ProductRequest::findOrFail($productRequestId);

    $proposal = OrderProposal::create([
        'product_request_id' => $productRequest->id,
        'contributor_id' => auth()->id(),
        'phone' => $request->phone,
        'message' => $request->message,
        'status' => 'pending'
    ]);

    // 🔹 Depuração para verificar se a proposta foi criada
    return redirect()->route('product-requests.show', $productRequest->id)
    ->with('success', 'Proposta enviada com sucesso!');

}


    // 🔹 Cliente aceita a proposta
    public function accept($id)
{
    $proposal = OrderProposal::findOrFail($id);

    // ✅ Verifica se o pedido existe antes de acessar `user_id`
    if (!$proposal->productRequest) {
        return redirect()->back()->with('error', 'O pedido associado a esta proposta não foi encontrado.');
    }

    if (auth()->id() !== $proposal->productRequest->user_id) {
        return redirect()->back()->with('error', 'Você não tem permissão para aceitar esta proposta.');
    }

    // ✅ Atualiza status corretamente
    $proposal->productRequest->orderProposals()->where('id', '!=', $proposal->id)->update(['status' => 'rejected']);
    $proposal->update(['status' => 'accepted']);
    $proposal->productRequest->update(['status' => 'in_progress']);

    return redirect()->back()->with('success', 'Proposta aceita com sucesso!');
}

public function reject($id)
{
    $proposal = OrderProposal::findOrFail($id);

    if (!$proposal->productRequest) {
        return redirect()->back()->with('error', 'O pedido associado a esta proposta não foi encontrado.');
    }

    if (auth()->id() !== $proposal->productRequest->user_id) {
        return redirect()->back()->with('error', 'Você não tem permissão para rejeitar esta proposta.');
    }

    $proposal->update(['status' => 'rejected']);

    return redirect()->back()->with('error', 'Proposta rejeitada.');
}

public function acceptedProposals()
{
    // Buscar todas as propostas aceitas do contribuinte logado
    $proposals = OrderProposal::where('contributor_id', auth()->id())
    ->whereIn('status', ['accepted', 'completed']) // ✅ Agora exibe ambas
    ->with('productRequest.user')
    ->latest()
    ->paginate(10);


    return view('pages.proposals', compact('proposals'));
}
public function show($id)
{
    $proposal = OrderProposal::where('id', $id)
        ->where('contributor_id', auth()->id()) // Garantir que o contribuinte só veja suas propostas
        ->with('productRequest.user') // Carregar detalhes do pedido e do cliente
        ->firstOrFail();

    return view('pages.proposal-details', compact('proposal'));
}
public function markAsCompleted($id)
{
    $proposal = OrderProposal::where('id', $id)
        ->where('contributor_id', auth()->id()) // Garantir que o contribuinte só possa concluir suas propostas
        ->firstOrFail();

    // Atualizar o status para concluído
    $proposal->update(['status' => 'completed']);

    // Atualizar o status do pedido também
    $proposal->productRequest->update(['status' => 'completed']);

    return redirect()->route('proposals.show', $id)->with('success', 'Pedido marcado como concluído!');
}

}
