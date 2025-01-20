@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Painel do Contribuinte</h1>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">Status: </span>
                <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    Ativo
                </span>
            </div>
        </div>

        <!-- Cards de Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                        <i class="fas fa-box fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pedidos Ativos</p>
                        <p class="text-2xl font-semibold">5</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-check-circle fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pedidos Concluídos</p>
                        <p class="text-2xl font-semibold">127</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-star fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Avaliação Média</p>
                        <p class="text-2xl font-semibold">4.8</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pedidos Ativos -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Pedidos Ativos</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4">Pedido</th>
                            <th class="text-left py-3 px-4">Cliente</th>
                            <th class="text-left py-3 px-4">Valor</th>
                            <th class="text-left py-3 px-4">Status</th>
                            <th class="text-left py-3 px-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4">#12345</td>
                            <td class="py-3 px-4">João Silva</td>
                            <td class="py-3 px-4">R$ 1.500,00</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                                    Em andamento
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <button class="text-indigo-600 hover:text-indigo-800">
                                    Ver Detalhes
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Avaliações Recentes -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-xl font-semibold mb-4">Avaliações Recentes</h2>
            <div class="space-y-4">
                <div class="border-b pb-4">
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="ml-2 text-sm text-gray-600">por Maria O. - 10/02/2024</span>
                    </div>
                    <p class="text-gray-700">
                        Excelente serviço! Muito atencioso e profissional. Entrega realizada antes do prazo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection