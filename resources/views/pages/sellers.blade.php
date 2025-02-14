@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Vendedores Disponíveis</h1>
        
        <!-- Filtros -->
        <form method="GET" action="{{ route('sellers.index') }}" class="bg-white p-4 rounded-lg shadow mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">País</label>
                    <select name="country" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Todos os países</option>
                        <option value="Brasil" {{ request('country') == 'Brasil' ? 'selected' : '' }}>Brasil</option>
                        <option value="Estados Unidos" {{ request('country') == 'Estados Unidos' ? 'selected' : '' }}>Estados Unidos</option>
                        <option value="Japão" {{ request('country') == 'Japão' ? 'selected' : '' }}>Japão</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Avaliação Mínima</label>
                    <select name="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Todas as avaliações</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4+ estrelas</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3+ estrelas</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Ordenar por</label>
                    <select name="sort" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Melhor avaliação</option>
                        <option value="orders" {{ request('sort') == 'orders' ? 'selected' : '' }}>Mais pedidos concluídos</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mais recentes</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Filtrar
            </button>
        </form>

        <!-- Lista de Vendedores -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($sellers as $seller)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 p-6">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($seller->name) }}" alt="{{ $seller->name }}">
                        <div class="ml-4">
    <h3 class="text-lg font-semibold">{{ $seller->name }}</h3>

    <!-- Exibir Avaliação abaixo do nome -->
    <div class="mt-1 flex items-center">
        <span class="text-yellow-400 flex">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= floor($seller->rating))
                    <i class="fas fa-star"></i>
                @elseif ($i - 0.5 <= $seller->rating)
                    <i class="fas fa-star-half-alt"></i>
                @else
                    <i class="far fa-star"></i>
                @endif
            @endfor
        </span>
        <span class="ml-2 text-sm text-gray-600">({{ number_format($seller->rating, 1) }})</span>
    </div>
</div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-600"><i class="fas fa-globe-americas mr-2"></i>{{ $seller->country }}</p>
                        <p class="text-gray-600"><i class="fas fa-box-open mr-2"></i>{{ $seller->completed_orders }} pedidos concluídos</p>
                        <p class="text-gray-600"><i class="fas fa-clock mr-2"></i>Membro desde {{ $seller->created_at->format('Y') }}</p>
                    </div>
                    <a href="{{ route('sellers.show', $seller->id) }}" 
   class="mt-4 w-full block text-center bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition">
    Ver Perfil
</a>


                </div>
            @empty
                <p class="text-gray-600">Nenhum vendedor encontrado.</p>
            @endforelse
        </div>

        <!-- Paginação -->
        <div class="mt-6">
            {{ $sellers->links() }}
        </div>
    </div>
</div>
@endsection
