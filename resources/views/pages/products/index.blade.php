@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Solicitações de Produtos</h1>
            <a href="{{ route('product-requests.create') }}" 
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>
                Nova Solicitação
            </a>
        </div>

      <!-- Filtros -->
<div class="bg-white p-4 rounded-lg shadow-sm mb-6">
    <form method="GET" action="{{ route('product-requests.index') }}">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Todos</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Em Andamento</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Concluído</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <!-- Categoria -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Categoria</label>
                <select name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Todas</option>
                    <option value="electronics" {{ request('category') == 'electronics' ? 'selected' : '' }}>Eletrônicos</option>
                    <option value="fashion" {{ request('category') == 'fashion' ? 'selected' : '' }}>Moda</option>
                    <option value="home" {{ request('category') == 'home' ? 'selected' : '' }}>Casa e Decoração</option>
                    <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Esportes</option>
                    <option value="beauty" {{ request('category') == 'beauty' ? 'selected' : '' }}>Beleza</option>
                    <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>

            <!-- País de Origem -->
            <div>
                <label class="block text-sm font-medium text-gray-700">País de Origem</label>
                <select name="origin_country" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Todos</option>
                    <option value="US" {{ request('origin_country') == 'US' ? 'selected' : '' }}>Estados Unidos</option>
                    <option value="JP" {{ request('origin_country') == 'JP' ? 'selected' : '' }}>Japão</option>
                    <option value="CN" {{ request('origin_country') == 'CN' ? 'selected' : '' }}>China</option>
                    <option value="UK" {{ request('origin_country') == 'UK' ? 'selected' : '' }}>Reino Unido</option>
                    <option value="KR" {{ request('origin_country') == 'KR' ? 'selected' : '' }}>Coreia do Sul</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                Filtrar
            </button>
            <a href="{{ route('product-requests.index') }}" class="px-4 py-2 ml-2 bg-gray-300 text-gray-700 rounded-md shadow hover:bg-gray-400">
                Limpar Filtros
            </a>
        </div>
    </form>
</div>

        <!-- Lista de Solicitações -->
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Produto
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Valor Estimado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Prazo
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($productRequests as $request)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $request->title }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ Str::limit($request->description, 50) }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'in_progress' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800',
                                ];
                                $statusNames = [
                                    'pending' => 'Pendente',
                                    'in_progress' => 'Em Andamento',
                                    'completed' => 'Concluído',
                                    'cancelled' => 'Cancelado',
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$request->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusNames[$request->status] ?? 'Desconhecido' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            R$ {{ number_format($request->estimated_price, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $request->deadline->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Ver Detalhes</a>
                            @if($request->status === 'pending')
                            <a href="#" class="text-red-600 hover:text-red-900">Cancelar</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Nenhuma solicitação encontrada
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginação -->
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $productRequests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection