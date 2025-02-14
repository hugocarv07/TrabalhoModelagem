<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Garante que a página de registro seja carregada corretamente
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'in:user,contributor'],
            'country' => ['nullable', 'string', 'max:100'],
        ]);

        $isContributor = $request->user_type === 'contributor';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_contributor' => $isContributor,
            'is_approved' => $isContributor ? false : true, // ✅ Vendedores precisam de aprovação
            'country' => $request->country,
            'rating' => 0,
            'completed_orders' => 0,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Cadastro realizado! Aguarde aprovação do administrador se for um vendedor.');
    }
}
