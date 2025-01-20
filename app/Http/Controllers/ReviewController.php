<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(User $contributor = null)
    {
        $query = Review::with(['user', 'contributor']);
        
        if ($contributor) {
            $reviews = $query->where('contributor_id', $contributor->id)
                ->latest()
                ->paginate(10);

            $averageRating = Review::where('contributor_id', $contributor->id)->avg('rating');
            $totalReviews = Review::where('contributor_id', $contributor->id)->count();
            $hasReviewed = auth()->check() ? Review::where('user_id', auth()->id())
                ->where('contributor_id', $contributor->id)
                ->exists() : false;

            return view('pages.reviews.index', [
                'contributor' => $contributor,
                'reviews' => $reviews,
                'averageRating' => $averageRating,
                'totalReviews' => $totalReviews,
                'hasReviewed' => $hasReviewed
            ]);
        }

        // Lista todas as avaliações se nenhum contribuidor for especificado
        $reviews = $query->latest()->paginate(10);
        return view('pages.reviews.list', [
            'reviews' => $reviews
        ]);
    }

    public function create(User $contributor)
    {
        if (!$contributor->isContributor()) {
            abort(404);
        }

        $hasReviewed = Review::where('user_id', auth()->id())
            ->where('contributor_id', $contributor->id)
            ->exists();

        if ($hasReviewed) {
            return redirect()->route('reviews.contributor', $contributor)
                ->with('error', 'Você já avaliou este colaborador.');
        }

        return view('pages.reviews.create', [
            'contributor' => $contributor
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'contributor_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000'
        ]);

        $contributor = User::findOrFail($validated['contributor_id']);
        
        if (!$contributor->isContributor()) {
            abort(404);
        }

        $hasReviewed = Review::where('user_id', auth()->id())
            ->where('contributor_id', $contributor->id)
            ->exists();

        if ($hasReviewed) {
            return redirect()->route('reviews.contributor', $contributor)
                ->with('error', 'Você já avaliou este colaborador.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'contributor_id' => $validated['contributor_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment']
        ]);

        return redirect()->route('reviews.contributor', $contributor)
            ->with('success', 'Avaliação enviada com sucesso!');
    }
}