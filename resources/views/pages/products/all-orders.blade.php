@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Pedidos do Site</h1>

        <div class="space-y-6">
            @forelse($productRequests as $order)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold">Pedido #{{ $order->id }}</h3>
                        <p class="text-sm text-gray-600">Cliente: {{ $order->user->name }}</p>
                        <p class="text-sm text-gray-600">Produto: {{ $order->title }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status == 'completed') bg-green-100 text-green-800
                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>
            @empty
            <p class="text-gray-600">Nenhum pedido registrado.</p>
            @endforelse

            <div class="mt-6">
                {{ $productRequests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
