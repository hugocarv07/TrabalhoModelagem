<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function sellerOrders()
    {
        // Buscar todos os pedidos disponíveis para os contribuintes
        $orders = ProductRequest::where('status', 'pending')->latest()->paginate(10);

        return view('pages.seller_orders', compact('orders'));
    }
}
