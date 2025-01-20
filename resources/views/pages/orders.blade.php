@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Minhas Encomendas</h1>

        <!-- Filtros -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>Todos</option>
                        <option>Em andamento</option>
                        <option>Concluído</option>
                        <option>Cancelado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Data</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>Últimos 30 dias</option>
                        <option>Últimos 3 meses</option>
                        <option>Últimos 6 meses</option>
                        <option>Todo o período</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Lista de Encomendas -->
        <div class="space-y-6">
            <!-- Encomenda Card -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold">#12345 - iPhone 14 Pro</h3>
                        <p class="text-sm text-gray-600">Solicitado em 15/02/2024</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Em andamento
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Vendedor</p>
                        <p class="font-medium">João Silva</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Valor Total</p>
                        <p class="font-medium">R$ 8.500,00</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Previsão de Entrega</p>
                        <p class="font-medium">30/03/2024</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-end space-x-3">
                    <button class="text-indigo-600 hover:text-indigo-800">
                        Ver Detalhes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection