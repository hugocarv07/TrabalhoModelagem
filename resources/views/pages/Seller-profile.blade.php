@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Cover Image -->
    <div class="h-64 w-full bg-gradient-to-r from-blue-600 to-indigo-700"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-32">
        <div class="space-y-6">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="sm:flex sm:space-x-5">
                        <div class="flex-shrink-0">
                            <img class="mx-auto h-32 w-32 rounded-full border-4 border-white shadow-sm" 
                                src="https://ui-avatars.com/api/?name={{ urlencode($seller->name) }}&size=128" 
                                alt="{{ $seller->name }}">
                        </div>
                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                            <div class="flex items-center">
                                <h1 class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $seller->name }}</h1>
                                <span class="ml-3 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    Vendedor Internacional
                                </span>
                            </div>
                            <p class="text-sm font-medium text-gray-600">Membro desde {{ $seller->created_at->format('M/Y') }}</p>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-1.5"></i>
                                {{ $seller->country ?? 'Localização não informada' }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 flex justify-center sm:mt-0">
                        <a href="{{ route('reviews.create', $seller->id) }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            <i class="fas fa-star mr-2"></i>
                            Avaliar Vendedor
                        </a>
                    </div>
                </div>

                <!-- Stats -->
                <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-3 border-t border-gray-200 pt-5">
                    <div class="px-4 py-5 bg-gray-50 shadow-sm rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Avaliação Média</dt>
                        <dd class="mt-1 flex items-baseline justify-between">
                            <div class="flex items-center">
                                <span class="text-2xl font-semibold text-gray-900">{{ number_format($averageRating, 1) }}</span>
                                <div class="ml-2 flex text-yellow-400">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $averageRating)
                                            <i class="fas fa-star"></i>
                                        @elseif ($i - 0.5 <= $averageRating)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">({{ $totalReviews }} avaliações)</span>
                        </dd>
                    </div>

                    <div class="px-4 py-5 bg-gray-50 shadow-sm rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Pedidos Concluídos</dt>
                        <dd class="mt-1 text-2xl font-semibold text-gray-900">{{ $completedOrders }}</dd>
                    </div>

                    <div class="px-4 py-5 bg-gray-50 shadow-sm rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Taxa de Sucesso</dt>
                        <dd class="mt-1 text-2xl font-semibold text-gray-900">98%</dd>
                    </div>
                </div>
            </div>

            <!-- About -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Sobre</h2>
                <div class="prose max-w-none text-gray-500">
                    <p>Vendedor internacional especializado em produtos eletrônicos e tecnologia. Atuo principalmente no mercado asiático, com foco em importações do Japão e Coreia do Sul.</p>
                    <p class="mt-4">Garanto a autenticidade de todos os produtos e ofereço suporte completo durante todo o processo de importação.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
