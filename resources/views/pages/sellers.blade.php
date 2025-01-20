@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Vendedores Disponíveis</h1>
        
        <!-- Filtros -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">País</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>Todos os países</option>
                        <option>Brasil</option>
                        <option>Estados Unidos</option>
                        <option>Japão</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Avaliação Mínima</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>Todas as avaliações</option>
                        <option>4+ estrelas</option>
                        <option>3+ estrelas</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Ordenar por</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>Melhor avaliação</option>
                        <option>Mais pedidos concluídos</option>
                        <option>Mais recentes</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Lista de Vendedores -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Vendedor Card -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 p-6">
                <div class="flex items-center mb-4">
                    <img class="h-12 w-12 rounded-full" src="https://via.placeholder.com/48" alt="Vendedor">
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">João Silva</h3>
                        <div class="flex items-center">
                            <span class="text-yellow-400 flex">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="ml-2 text-sm text-gray-600">(4.5)</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="text-gray-600"><i class="fas fa-globe-americas mr-2"></i>Brasil</p>
                    <p class="text-gray-600"><i class="fas fa-box-open mr-2"></i>150 pedidos concluídos</p>
                    <p class="text-gray-600"><i class="fas fa-clock mr-2"></i>Membro desde 2023</p>
                </div>
                <button class="mt-4 w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors">
                    Ver Perfil
                </button>
            </div>
        </div>
    </div>
</div>
@endsection