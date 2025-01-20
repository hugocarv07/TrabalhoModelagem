@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pt-24 pb-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Avaliar Colaborador</h1>
                <p class="mt-2 text-gray-600">Compartilhe sua experiência com {{ $contributor->name }}</p>
            </div>

            @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Corrija os erros abaixo:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="contributor_id" value="{{ $contributor->id }}">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Avaliação</label>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                            <label class="cursor-pointer p-2">
                                <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                <i class="fas fa-star text-2xl peer-checked:text-yellow-400 text-gray-300 hover:text-yellow-400 transition-colors"></i>
                            </label>
                            @endfor
                        </div>
                    </div>
                </div>

                <div>
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comentário</label>
                    <textarea name="comment" id="comment" rows="4" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Conte sua experiência com este colaborador..." required>{{ old('comment') }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Enviar Avaliação
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection