@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Minhas Propostas Aceitas</h1>

        <div class="space-y-6">
            @forelse($proposals as $proposal)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold">Pedido: {{ $proposal->productRequest->title }}</h3>
                        <p class="text-sm text-gray-600">Cliente: {{ $proposal->productRequest->user->name }}</p>
                        <p class="text-sm text-gray-600">Data da Aceitação: {{ $proposal->updated_at->format('d/m/Y') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium
    @if($proposal->status == 'accepted') bg-green-100 text-green-800
    @elseif($proposal->status == 'completed') bg-blue-100 text-blue-800
    @endif">
    {{ $proposal->status == 'accepted' ? 'Aceita' : 'Concluída' }}
</span>

                </div>
                <a href="{{ route('proposals.show', $proposal->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
    Ver Detalhes da Proposta
</a>

            </div>
            @empty
            <p class="text-gray-600">Nenhuma proposta aceita até o momento.</p>
            @endforelse

            <div class="mt-6">
                {{ $proposals->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
