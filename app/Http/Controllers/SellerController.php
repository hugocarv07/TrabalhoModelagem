<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        // Buscar apenas vendedores aprovados
        $query = User::where('is_contributor', true)
                     ->where('is_approved', true);

        // Filtro por país (se especificado)
        if (!empty($request->country)) {
            $query->where('country', $request->country);
        }

        // Filtro por avaliação mínima (se especificado)
        if (!empty($request->rating) && is_numeric($request->rating)) {
            $query->where('rating', '>=', (int)$request->rating);
        }

        // Ordenação com valores seguros
        $validSortOptions = ['rating', 'orders', 'newest'];
        if (!empty($request->sort) && in_array($request->sort, $validSortOptions)) {
            if ($request->sort === 'rating') {
                $query->orderBy('rating', 'desc');
            } elseif ($request->sort === 'orders') {
                $query->orderBy('completed_orders', 'desc');
            } elseif ($request->sort === 'newest') {
                $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('rating', 'desc'); // Ordenação padrão: melhor avaliação
        }

        // Paginação
        $sellers = $query->paginate(9);

        return view('pages.sellers', compact('sellers'));
    }

    public function show(User $seller)
    {
        // Verifica se o vendedor está aprovado
        if (!$seller->is_contributor || !$seller->is_approved) {
            abort(404); // Retorna erro 404 se o vendedor não for válido
        }
    
        // Buscar avaliações do vendedor usando 'contributor_id'
        $averageRating = Review::where('contributor_id', $seller->id)->avg('rating') ?? 0;
        $totalReviews = Review::where('contributor_id', $seller->id)->count();
        $reviews = Review::where('contributor_id', $seller->id)->latest()->take(5)->get();
        $completedOrders = $seller->completed_orders ?? 0;
    
        return view('pages.seller-profile', compact(
            'seller',
            'averageRating',
            'totalReviews',
            'completedOrders',
            'reviews'
        ));
    }
    
}
