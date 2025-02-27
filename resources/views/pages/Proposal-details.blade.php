@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Detalhes da Proposta</h1>

        <!-- Informações do Produto -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-xl font-semibold mb-4">Informações do Produto</h2>
            
            @if(isset($proposal->productRequest))
                <p><strong>Produto:</strong> {{ $proposal->productRequest->title }}</p>
                <p><strong>Descrição:</strong> {{ $proposal->productRequest->description }}</p>
                <p><strong>Preço Estimado:</strong> R$ {{ number_format($proposal->productRequest->estimated_price, 2, ',', '.') }}</p>
                <p><strong>Quantidade:</strong> {{ $proposal->productRequest->quantity }}</p>
                <p><strong>Status:</strong> 
                    <span class="px-3 py-1 rounded-full text-sm font-medium 
                        @if($proposal->status == 'accepted') bg-green-100 text-green-800 
                        @elseif($proposal->status == 'completed') bg-blue-100 text-blue-800 
                        @endif">
                        {{ ucfirst($proposal->status) }}
                    </span>
                </p>
            @else
                <p class="text-red-500">Erro: As informações do produto não estão disponíveis.</p>
            @endif
        </div>

        <!-- Informações do Cliente -->
        @if(isset($proposal->productRequest->user))
            <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                <h2 class="text-xl font-semibold mb-4">Informações do Cliente</h2>
                <p><strong>Nome:</strong> {{ $proposal->productRequest->user->name }}</p>
                <p><strong>Email:</strong> {{ $proposal->productRequest->user->email }}</p>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                <h2 class="text-xl font-semibold mb-4 text-red-500">Erro: Cliente não encontrado.</h2>
            </div>
        @endif

        <!-- Botão para marcar como concluído -->
        @if($proposal->status == 'accepted')
            <div class="mt-6">
                <form method="POST" action="{{ route('proposals.complete', $proposal->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Marcar como Concluído
                    </button>
                </form>
            </div>
        @endif

     <!-- Botões de Avaliação -->
@if($proposal->status == 'completed')
    <div class="mt-6 flex space-x-4">
        <!-- Se o usuário for o comprador, ele pode avaliar o contribuinte -->
        @if(auth()->id() === optional($proposal->productRequest)->user_id && !empty($proposal->contributor_id))
            <a href="{{ route('reviews.create', ['userId' => $proposal->contributor_id]) }}" 
               class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                Avaliar Contribuinte
            </a>
        @endif

        <!-- Se o usuário for o contribuidor, ele pode avaliar o cliente -->
        @if(auth()->id() === $proposal->contributor_id 
             && !empty(optional($proposal->productRequest->user)->id))
            <a href="{{ route('reviews.create', ['userId' => $proposal->productRequest->user->id]) }}" 
               class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
                Avaliar Cliente
            </a>
        @endif
    </div>
@endif

    </div>
</div>
@endsection
