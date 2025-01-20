@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pt-24 pb-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Solicitar Produto</h1>
                <p class="mt-2 text-gray-600">Preencha os detalhes do produto que você deseja importar.</p>
            </div>

            @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Corrija os erros abaixo:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('product-requests.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Título do Produto</label>
                    <input type="text" name="title" id="title" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Ex: iPhone 14 Pro Max 256GB" value="{{ old('title') }}" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição Detalhada</label>
                    <textarea name="description" id="description" rows="4" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Descreva o produto com o máximo de detalhes possível..." required>{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select name="category" id="category" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="electronics">Eletrônicos</option>
                            <option value="fashion">Moda</option>
                            <option value="home">Casa e Decoração</option>
                            <option value="sports">Esportes</option>
                            <option value="beauty">Beleza</option>
                            <option value="other">Outros</option>
                        </select>
                    </div>

                    <div>
                        <label for="origin_country" class="block text-sm font-medium text-gray-700">País de Origem</label>
                        <select name="origin_country" id="origin_country" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Selecione o país</option>
                            <option value="US">Estados Unidos</option>
                            <option value="JP">Japão</option>
                            <option value="CN">China</option>
                            <option value="UK">Reino Unido</option>
                            <option value="KR">Coreia do Sul</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="estimated_price" class="block text-sm font-medium text-gray-700">Preço Estimado (R$)</label>
                        <input type="number" name="estimated_price" id="estimated_price" step="0.01" min="0" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="0.00" value="{{ old('estimated_price') }}" required>
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantidade</label>
                        <input type="number" name="quantity" id="quantity" min="1" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="1" value="{{ old('quantity', 1) }}" required>
                    </div>

                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-700">Prazo Desejado</label>
                        <input type="date" name="deadline" id="deadline" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('deadline') }}" required>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Enviar Solicitação
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection