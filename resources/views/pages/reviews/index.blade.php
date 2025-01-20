@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Avaliações de {{ $contributor->name }}</h1>
                <div class="mt-2 flex items-center">
                    <div class="flex text-yellow-400">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageRating)
                                <i class="fas fa-star"></i>
                            @elseif ($i - 0.5 <= $averageRating)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="ml-2 text-gray-600">{{ number_format($averageRating, 1) }} ({{ $totalReviews }} avaliações)</span>
                </div>
            </div>
            
            @if(auth()->check() && !$hasReviewed)
            <a href="{{ route('reviews.create', $contributor->id) }}" 
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                <i class="fas fa-star mr-2"></i>
                Avaliar Colaborador
            </a>
            @endif
        </div>

        <!-- Filtros -->
        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
            <div class="flex items-center space-x-4">
                <select class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Todas as estrelas</option>
                    <option value="5">5 estrelas</option>
                    <option value="4">4 estrelas</option>
                    <option value="3">3 estrelas</option>
                    <option value="2">2 estrelas</option>
                    <option value="1">1 estrela</option>
                </select>
                <select class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="recent">Mais recentes</option>
                    <option value="old">Mais antigas</option>
                </select>
            </div>
        </div>

        <!-- Lista de Avaliações -->
        <div class="space-y-6">
            @foreach($reviews as $review)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($review->user->name) }}" alt="{{ $review->user->name }}">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">{{ $review->user->name }}</h3>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">{{ $review->comment }}</p>
            </div>
            @endforeach

            <!-- Paginação -->
            <div class="mt-6">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
</div>
@endsection