@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Conecte-se ao mundo:</span>
                        <span class="block text-indigo-600">Compre e receba produtos de qualquer lugar com segurança!</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    No Caixeiro Viajante, você solicita produtos de outros países e conta com colaboradores confiáveis para facilitar sua importação.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Começar Agora
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                Saiba Mais
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ Vite::asset('resources/images/airplane.jpg') }}" alt="Airplane flying">
    </div>
</div>

<!-- Como Funciona Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Como Funciona?
            </h2>
            <p class="mt-4 text-lg text-gray-500">
                Quatro passos simples para conseguir seus produtos
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mx-auto">
                    <i class="fa-solid fa-cube"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900">Solicite Seus produtos</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Cadastre seu pedido especificando o produto que deseja importar
                    </p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mx-auto">
                    <i class="fa-solid fa-globe"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900">Conecte-se com um Colaborador</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Encontre um colaborador confiável no país de origem
                    </p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mx-auto">
                    <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900">Acompanhe o Status</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Acompanhe o processo e receba seu produto com segurança
                    </p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mx-auto">
                    <i class="fa-regular fa-star"></i>
                    </div>
                    <h3 class="mt-5 text-lg font-medium text-gray-900">Avalie e Seja Avaliado</h3>
                    <p class="mt-2 text-base text-gray-500">
                    Mantenha a comunidade segura e confiável.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                O que nossos clientes dizem
            </h2>
        </div>
        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="{{ Vite::asset('resources/images/testimonial-1.jpg') }}" alt="User">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold text-gray-900">Mario Silva</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        "Excelente serviço! Consegui importar produtos do Japão com muita facilidade e segurança."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="{{ Vite::asset('resources/images/testimonial-2.jpg') }}" alt="User">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold text-gray-900">João Santos</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        "Plataforma muito confiável e colaboradores super atenciosos. Recomendo!"
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="{{ Vite::asset('resources/images/testimonial-3.jpg') }}" alt="User">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold text-gray-900">Ana Oliveira</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        "Finalmente encontrei uma forma segura de importar produtos. O processo é muito transparente!"
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection