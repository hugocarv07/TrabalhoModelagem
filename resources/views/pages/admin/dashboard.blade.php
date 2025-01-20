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
                        <p class="text-sm text-gray-600">Usuários Ativos</p>
                        <p class="text-2xl font-semibold">1,234</p>
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
                        <p class="text-2xl font-semibold">56</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Aguardando Aprovação</p>
                        <p class="text-2xl font-semibold">12</p>
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
                        <p class="text-2xl font-semibold">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aprovações Pendentes -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Aprovações Pendentes</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4">Vendedor</th>
                            <th class="text-left py-3 px-4">País</th>
                            <th class="text-left py-3 px-4">Data do Cadastro</th>
                            <th class="text-left py-3 px-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4">Maria Santos</td>
                            <td class="py-3 px-4">Portugal</td>
                            <td class="py-3 px-4">15/02/2024</td>
                            <td class="py-3 px-4">
                                <button class="text-green-600 hover:text-green-800 mr-3">
                                    <i class="fas fa-check"></i> Aprovar
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-times"></i> Recusar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection