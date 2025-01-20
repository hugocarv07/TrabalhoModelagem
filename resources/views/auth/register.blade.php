@extends('layouts.app')

@section('content')
<div class="min-h-screen flex">
    <!-- Left Side - Image -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-tr from-blue-800 to-indigo-900 p-12 relative overflow-hidden">
        <div class="relative z-10">
            <img class="h-12 mb-12 my-5" src="{{ Vite::asset('resources/images/logo-white.svg') }}" alt="Logo">
            <h2 class="text-4xl font-bold text-white mb-6">Junte-se a nós</h2>
            <p class="text-blue-100 text-lg mb-8">Faça parte da maior rede de importação colaborativa do mundo.</p>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-800/30 p-4 rounded-xl backdrop-blur-sm">
                    <i class="fas fa-shield-alt text-blue-400 text-xl mb-2"></i>
                    <h3 class="text-white font-semibold mb-1">100% Seguro</h3>
                    <p class="text-blue-200 text-sm">Transações protegidas e verificadas</p>
                </div>
                <div class="bg-blue-800/30 p-4 rounded-xl backdrop-blur-sm">
                    <i class="fas fa-globe text-blue-400 text-xl mb-2"></i>
                    <h3 class="text-white font-semibold mb-1">Global</h3>
                    <p class="text-blue-200 text-sm">Acesso a produtos do mundo todo</p>
                </div>
            </div>
        </div>
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -right-10 top-1/4 w-72 h-72 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full filter blur-3xl opacity-30"></div>
            <div class="absolute -left-10 bottom-1/4 w-72 h-72 bg-gradient-to-tr from-indigo-400 to-purple-600 rounded-full filter blur-3xl opacity-30"></div>
        </div>
    </div>

    <!-- Right Side - Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-gray-50">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center lg:text-left">
                <img class="h-12 mx-auto lg:hidden mb-8" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo">
                <h2 class="text-3xl font-bold text-gray-900 my-5">Criar nova conta</h2>
                <p class="mt-2 text-gray-600">Preencha os dados abaixo para começar</p>
            </div>

            @if ($errors->any())
            <div class="p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Ocorreram alguns erros</h3>
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

            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome completo</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="name" name="name" type="text" required value="{{ old('name') }}"
                                class="block w-full pl-11 pr-4 py-3 text-gray-900 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Seu nome completo">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="block w-full pl-11 pr-4 py-3 text-gray-900 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="seu@email.com">
                        </div>
                    </div>

                    <div>
                        <label for="user_type" class="block text-sm font-medium text-gray-700">Tipo de conta</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-users text-gray-400"></i>
                            </div>
                            <select id="user_type" name="user_type" required
                                class="block w-full pl-11 pr-4 py-3 text-gray-900 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="user">Comprador</option>
                                <option value="contributor">Vendedor Internacional</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-11 pr-4 py-3 text-gray-900 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a senha</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full pl-11 pr-4 py-3 text-gray-900 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Criar conta
                </button>

                <div class="text-center">
                    <span class="text-gray-600">Já tem uma conta?</span>
                    <a href="{{ route('login') }}" class="ml-1 font-medium text-blue-600 hover:text-blue-500 transition-colors">
                        Fazer login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection