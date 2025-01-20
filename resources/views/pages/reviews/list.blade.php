@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Todas as Avaliações</h1>

        <!-- Lista de Avaliações -->
        <div class="space-y-6">
            @foreach($reviews as $review)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($review->user->name) }}" alt="{{ $review->user->name }}">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">{{ $review->user->name }}</h3>
                            <p class="text-sm text-gray-500">Avaliou {{ $review->contributor->name }}</p>
                            <div class="flex items-center mt-1">
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