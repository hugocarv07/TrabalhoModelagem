@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Colaboradores para Avaliar</h1>

        <div class="space-y-6">
            @forelse($contributors as $contributor)
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($contributor->name) }}" alt="{{ $contributor->name }}">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">{{ $contributor->name }}</h3>
                            <p class="text-sm text-gray-500">
                                Avaliação Média:
                                @if($contributor->reviewsReceived && $contributor->reviewsReceived->count() > 0)
                                    {{ number_format($contributor->reviewsReceived->avg('rating'), 1) }} ⭐
                                @else
                                    Sem avaliações
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Depuração: Exibe a URL antes de carregar a página --}}
                    {{-- {{ dd(route('reviews.create', ['contributor' => $contributor->id])) }} --}}

                    {{-- Impede o usuário de avaliar a si mesmo --}}
                    @if(auth()->id() !== $contributor->id)
                       
<a href="{{ route('reviews.create', ['userId' => $contributor->id]) }}"
    class="inline-flex items-center px-4 py-2 ...">
    Avaliar
</a>

                    @else
                        <span class="text-gray-400 text-sm">Você não pode se avaliar</span>
                    @endif
                </div>
            @empty
                <p class="text-gray-600 text-center">Nenhum colaborador para avaliar no momento.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
