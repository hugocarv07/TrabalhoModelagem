@extends('layouts.app')

@section('content')
<div class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Cabeçalho -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <nav class="flex mb-3" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ route('product-requests.index') }}" class="text-gray-500 hover:text-gray-700">
                                Solicitações
                            </a>
                        </li>
                        <li class="text-gray-500">/</li>
                        <li class="text-gray-900 font-medium">{{ $productRequest->title }}</li>
                    </ol>
                </nav>
                <h1 class="text-3xl font-bold text-gray-900">{{ $productRequest->title }}</h1>
            </div>

            @if($productRequest->status === 'pending')
            <form action="{{ route('product-requests.destroy', $productRequest->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar esta solicitação?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar Solicitação
                </button>
            </form>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Informações Principais -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Status do Pedido -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Status do Pedido</h2>
                    <div class="flex items-center">
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
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusClasses[$productRequest->status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ $statusNames[$productRequest->status] ?? 'Desconhecido' }}
                        </span>
                        <span class="ml-3 text-sm text-gray-500">
                            Atualizado em {{ $productRequest->updated_at->format('d/m/Y \à\s H:i') }}
                        </span>
                    </div>
                </div>
                @if(auth()->user() && auth()->user()->is_contributor)
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-bold mb-4">Enviar Proposta</h3>
        <p class="text-gray-600 mb-4">
            Envie sua proposta para aceitar este pedido. O cliente poderá visualizar sua avaliação, telefone e mensagem personalizada antes de decidir.
        </p>

        <form action="{{ route('proposals.store', $productRequest->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Seu Telefone de Contato</label>
                <input type="text" name="phone" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Mensagem para o Cliente</label>
                <textarea name="message" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Enviar Proposta
            </button>
        </form>
    </div>
@endif

                <!-- Detalhes do Produto -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Detalhes do Produto</h2>
                    <p class="text-gray-700">{{ $productRequest->description }}</p>
                    <dl class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Categoria</dt>
                            <dd class="mt-1 text-sm text-gray-900">Eletrônicos</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">País de Origem</dt>
                            <dd class="mt-1 text-sm text-gray-900">Estados Unidos</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Quantidade</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $productRequest->quantity }} unidade(s)</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Prazo Desejado</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $productRequest->deadline->format('d/m/Y') }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Histórico -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Histórico</h2>
                    <div class="flow-root">
                        <ul class="-mb-8">
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                <i class="fas fa-check text-white"></i>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-sm text-gray-500">Pedido criado</p>
                                            </div>
                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time>{{ $productRequest->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') }}</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(auth()->id() === $productRequest->user_id) 
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-bold mb-4">Propostas Recebidas</h3>
        
        @if($productRequest->orderProposals->count() > 0)
            <div class="space-y-4">
                @foreach($productRequest->orderProposals as $proposal)
                    <div class="p-4 border border-gray-200 rounded-md">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-700">
                                    <strong>Colaborador:</strong> {{ $proposal->contributor->name }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <strong>Avaliação:</strong> {{ number_format($proposal->contributor->reviews()->avg('rating') ?? 0, 1) }} ⭐
                                </p>
                                <p class="text-sm text-gray-600">
                                    <strong>Telefone:</strong> {{ $proposal->phone }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <strong>Mensagem:</strong> {{ $proposal->message }}
                                </p>
                            </div>

                            <!-- Botões de Aceitar/Rejeitar -->
                            @if($proposal->status === 'pending')
                                <div class="flex space-x-2">
                                    <form action="{{ route('proposals.accept', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                            Aceitar
                                        </button>
                                    </form>
                                    <form action="{{ route('proposals.reject', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                            Rejeitar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <p class="text-sm font-semibold {{ $proposal->status === 'accepted' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $proposal->status === 'accepted' ? 'Proposta Aceita' : 'Proposta Rejeitada' }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">Nenhuma proposta recebida ainda.</p>
        @endif
    </div>
@endif


            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Informações de Preço -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informações de Preço</h2>
                    <div class="flex justify-between py-3 text-sm">
                        <dt class="text-gray-500">Valor Estimado</dt>
                        <dd class="text-gray-900 font-medium">
                            R$ {{ number_format($productRequest->estimated_price, 2, ',', '.') }}
                        </dd>
                    </div>
                    <div class="flex justify-between py-3 text-sm border-t border-gray-200">
                        <dt class="text-gray-500">Quantidade</dt>
                        <dd class="text-gray-900">{{ $productRequest->quantity }} unidade(s)</dd>
                    </div>
                    <div class="flex justify-between py-3 text-sm border-t border-gray-200">
                        <dt class="text-gray-500">Total Estimado</dt>
                        <dd class="text-gray-900 font-medium">
                            R$ {{ number_format($productRequest->estimated_price * $productRequest->quantity, 2, ',', '.') }}
                        </dd>
                    </div>
                </div>

                <!-- Informações do Solicitante -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informações do Solicitante</h2>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($productRequest->user->name) }}" alt="{{ $productRequest->user->name }}">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ $productRequest->user->name }}</p>
                            <p class="text-sm text-gray-500">Membro desde {{ $productRequest->user->created_at->format('M/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
