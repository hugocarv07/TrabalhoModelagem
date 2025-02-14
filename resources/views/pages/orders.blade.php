@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Minhas Encomendas</h1>

        <!-- Filtros -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <form method="GET" action="{{ route('product-requests.myOrders') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" onchange="this.form.submit()"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Todos</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Em andamento</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Concluído</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Período</label>
                    <select name="date_filter" onchange="this.form.submit()"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Todo o período</option>
                        <option value="last_30_days" {{ request('date_filter') == 'last_30_days' ? 'selected' : '' }}>Últimos 30 dias</option>
                        <option value="last_3_months" {{ request('date_filter') == 'last_3_months' ? 'selected' : '' }}>Últimos 3 meses</option>
                        <option value="last_6_months" {{ request('date_filter') == 'last_6_months' ? 'selected' : '' }}>Últimos 6 meses</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Lista de Encomendas -->
        <div class="space-y-6">
            @forelse ($productRequests as $order)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold">#{{ $order->id }} - {{ $order->title }}</h3>
                        <p class="text-sm text-gray-600">Solicitado em {{ $order->created_at->format('d/m/Y') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status == 'completed') bg-green-100 text-green-800
                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Quantidade</p>
                        <p class="font-medium">{{ $order->quantity }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Preço Estimado</p>
                        <p class="font-medium">R$ {{ number_format($order->estimated_price, 2, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Previsão de Entrega</p>
                        <p class="font-medium">
                            @if($order->deadline)
                                {{ \Carbon\Carbon::parse($order->deadline)->format('d/m/Y') }}
                            @else
                                Não informada
                            @endif
                        </p>
                    </div>
                </div>
                <div class="mt-4 flex justify-end space-x-3">
                    <a href="{{ route('product-requests.show', $order->id) }}" class="text-indigo-600 hover:text-indigo-800">
                        Ver Detalhes
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-600 text-center">Nenhuma encomenda encontrada.</p>
            @endforelse

            <!-- Paginação -->
            <div class="mt-6">
                {{ $productRequests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
