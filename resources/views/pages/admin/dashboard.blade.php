@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Painel Administrativo</h1>

        <!-- Cards de Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Usuários Cadastrados</p>
                        <p class="text-2xl font-semibold">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-box fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pedidos Ativos</p>
                        <p class="text-2xl font-semibold">{{ $activeOrders }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pedidos Pendentes</p>
                        <p class="text-2xl font-semibold">{{ $pendingRequests }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <i class="fas fa-exclamation-circle fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Problemas Reportados</p>
                        <p class="text-2xl font-semibold">{{ $reportedIssues }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendedores Pendentes -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Vendedores Aguardando Aprovação</h2>

            @if($pendingSellers->isEmpty())
                <p class="text-gray-600">Nenhum vendedor pendente no momento.</p>
            @else
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b bg-gray-100">
                            <th class="text-left py-3 px-4">Nome</th>
                            <th class="text-left py-3 px-4">Email</th>
                            <th class="text-left py-3 px-4">País</th>
                            <th class="text-left py-3 px-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingSellers as $seller)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $seller->name }}</td>
                            <td class="py-3 px-4">{{ $seller->email }}</td>
                            <td class="py-3 px-4">{{ $seller->country ?? 'N/A' }}</td>
                            <td class="py-3 px-4 flex space-x-2">
                                <!-- Botão de Aprovar -->
                                <form action="{{ route('sellers.approve', $seller->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-3 py-1 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700">
                                        <i class="fas fa-check"></i> Aprovar
                                    </button>
                                </form>

                                <!-- Botão de Rejeitar -->
                                <form action="{{ route('sellers.reject', $seller->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                        <i class="fas fa-times"></i> Rejeitar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
