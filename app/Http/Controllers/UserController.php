<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProductRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Recupera os pedidos do usuário
        $productRequests = ProductRequest::where('user_id', $user->id)
                                         ->latest()
                                         ->take(5)
                                         ->get();

        return view('pages.user-profile', compact('user', 'productRequests'));
    }
}
