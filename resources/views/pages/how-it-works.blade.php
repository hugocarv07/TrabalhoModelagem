@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 pt-32 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-white sm:text-5xl md:text-6xl pt-x:30">
                Como Funciona o Caixeiro Viajante
            </h1>
            <p class="mt-4 text-xl text-blue-100 max-w-3xl mx-auto">
                Descubra como nossa plataforma conecta compradores a vendedores internacionais de forma segura e eficiente
            </p>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-40 bg-gradient-to-t from-white"></div>
    </div>

    <!-- Process Section -->
    <div class="py-16 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Processo Simplificado em 4 Etapas</h2>
                <p class="mt-4 text-lg text-gray-600">Do pedido à entrega, acompanhe cada passo do processo</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative">
                    <div class="bg-blue-50 rounded-2xl p-6 text-center relative z-10">
                        <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold mx-auto mb-4">1</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Cadastre seu Pedido</h3>
                        <p class="text-gray-600">Descreva o produto que deseja importar com detalhes e especificações</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative">
                    <div class="bg-blue-50 rounded-2xl p-6 text-center relative z-10">
                        <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold mx-auto mb-4">2</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Receba Propostas</h3>
                        <p class="text-gray-600">Vendedores internacionais enviarão propostas para seu pedido</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative">
                    <div class="bg-blue-50 rounded-2xl p-6 text-center relative z-10">
                        <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold mx-auto mb-4">3</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Escolha e Pague</h3>
                        <p class="text-gray-600">Selecione a melhor proposta e efetue o pagamento com segurança</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative">
                    <div class="bg-blue-50 rounded-2xl p-6 text-center relative z-10">
                        <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold mx-auto mb-4">4</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Receba seu Produto</h3>
                        <p class="text-gray-600">Acompanhe o envio e receba seu produto em casa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Por que Escolher o Caixeiro Viajante?</h2>
                <p class="mt-4 text-lg text-gray-600">Benefícios que fazem a diferença</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Benefit 1 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">100% Seguro</h3>
                    <p class="text-gray-600">Pagamentos protegidos e vendedores verificados para sua segurança</p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Melhor Preço</h3>
                    <p class="text-gray-600">Compare propostas e escolha a melhor oferta para seu produto</p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-headset text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Suporte Dedicado</h3>
                    <p class="text-gray-600">Atendimento personalizado em todas as etapas do processo</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Histórias de Sucesso</h2>
                <p class="mt-4 text-lg text-gray-600">Conheça quem já realizou importações com a gente</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Story 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/Historias.jpeg') }}" alt="Success Story 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb" alt="User" class="w-10 h-10 rounded-full">
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-900">Ana Silva</h4>
                                <p class="text-sm text-gray-600">São Paulo, SP</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">"Consegui importar meus produtos eletrônicos do Japão com preço muito melhor que no Brasil. O processo foi super tranquilo!"</p>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/Historias.jpeg') }}" alt="Success Story 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="User" class="w-10 h-10 rounded-full">
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-900">Pedro Santos</h4>
                                <p class="text-sm text-gray-600">Rio de Janeiro, RJ</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">"Importei roupas de marca dos EUA por um preço incrível. A entrega foi mais rápida do que eu esperava!"</p>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <!-- Story 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/Historias.jpeg') }}" alt="Success Story 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="User" class="w-10 h-10 rounded-full">
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-900">Maria Costa</h4>
                                <p class="text-sm text-gray-600">Curitiba, PR</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">"Comprei cosméticos coreanos com ótimo preço. O vendedor foi super atencioso e me ajudou em todo o processo!"</p>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Pronto para Começar?</h2>
            <p class="text-xl text-blue-100 mb-8">Junte-se a milhares de pessoas que já estão economizando em suas importações</p>
            <a href="{{ route('register')}}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                Criar Conta Grátis
            </a>
        </div>
    </div>
</div>
@endsection