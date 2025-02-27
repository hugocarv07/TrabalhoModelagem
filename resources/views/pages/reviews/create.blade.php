@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pt-24 pb-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            {{-- Agora a variável se chama $contributor, pois renomeamos no Controller --}}
            <h1 class="text-3xl font-bold text-gray-900">Avaliar {{ $contributor->name }}</h1>

            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                @csrf
                {{-- Passamos o ID do "contributor" para o formulário --}}
                <input type="hidden" name="contributor_id" value="{{ $contributor->id }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Avaliação</label>
                    <div class="flex items-center space-x-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <label class="cursor-pointer p-2">
                                <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                <i class="fas fa-star text-2xl peer-checked:text-yellow-400 text-gray-300 hover:text-yellow-400 transition-colors"></i>
                            </label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comentário</label>
                    <textarea name="comment" id="comment" rows="4" required
                              class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Conte sua experiência com este colaborador..."></textarea>
                </div>

                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                    Enviar Avaliação
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
