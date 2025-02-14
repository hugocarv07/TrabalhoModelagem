<?php

namespace App\Http\Controllers;

use App\Models\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductRequest::with('user');

        // Aplicar filtros opcionais
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('origin_country')) {
            $query->where('origin_country', $request->origin_country);
        }

        $productRequests = $query->latest()->paginate(10);

        return view('pages.products.index', compact('productRequests'));
    }

    public function show($id)
    {
        $productRequest = ProductRequest::with(['user', 'orderProposals.contributor'])->findOrFail($id);
        return view('pages.products.show', compact('productRequest'));
    }
    
    public function orderProposals()
{
    return $this->hasMany(OrderProposal::class, 'product_request_id');
}

    
    public function destroy($id)
    {
        $productRequest = ProductRequest::findOrFail($id);

        if ($productRequest->status !== 'pending') {
            return redirect()->route('product-requests.index')
                ->with('error', 'Apenas pedidos pendentes podem ser cancelados.');
        }

        $productRequest->delete();

        return redirect()->route('product-requests.index')
            ->with('success', 'Solicitação cancelada com sucesso.');
    }

    public function create()
    {
        return view('pages.products.request');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'estimated_price' => 'required|numeric|min:0',
        'category' => 'required',
        'origin_country' => 'required',
        'deadline' => 'required|date|after:today',
        'quantity' => 'required|integer|min:1'
    ]);

    $validated['user_id'] = auth()->id();
    $validated['status'] = 'pending';

    ProductRequest::create($validated);

    // 🔹 Redirecionando para a página de encomendas após criar a solicitação
    return redirect()->route('product-requests.myOrders')
        ->with('success', 'Solicitação criada com sucesso! Você pode acompanhar em "Minhas Encomendas".');
}

    // 🔹 Clientes veem apenas seus pedidos
    public function myOrders(Request $request)
{
    $query = ProductRequest::where('user_id', Auth::id())->with('user');

    // Aplicar filtros opcionais
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }
    if ($request->filled('date_filter')) {
        $dateFilter = $request->date_filter;
        if ($dateFilter === 'last_30_days') {
            $query->where('created_at', '>=', now()->subDays(30));
        } elseif ($dateFilter === 'last_3_months') {
            $query->where('created_at', '>=', now()->subMonths(3));
        } elseif ($dateFilter === 'last_6_months') {
            $query->where('created_at', '>=', now()->subMonths(6));
        }
    }

    $productRequests = $query->latest()->paginate(10);

    return view('pages.orders', compact('productRequests')); // Certificando-se do caminho correto
}



    // 🔹 Admins veem todos os pedidos do site
    public function allOrders(Request $request)
{
    $query = ProductRequest::with('user');

    // Aplicar filtros opcionais
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    if ($request->filled('origin_country')) {
        $query->where('origin_country', $request->origin_country);
    }

    $productRequests = $query->latest()->paginate(10);

    return view('pages.products.all-orders', compact('productRequests')); // 🔹 Agora está correto!
}


}
