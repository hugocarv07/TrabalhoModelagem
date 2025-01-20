<?php

namespace App\Http\Controllers;

use App\Models\ProductRequest;
use Illuminate\Http\Request;

class ProductRequestController extends Controller
{
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

        return redirect()->route('product-requests.index')
            ->with('success', 'Solicitação criada com sucesso!');
    }
}