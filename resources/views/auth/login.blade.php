@extends('layouts.app')

@section('content')
<div class="min-h-screen flex">
    <!-- Left Side - Image -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-tr from-blue-800 to-indigo-900 p-12 relative overflow-hidden">
        <div class="relative z-10">
            <img class="h-12 mb-12 my-5" src="{{ Vite::asset('resources/images/logo-white.svg') }}" alt="Logo">
            <h2 class="text-4xl font-bold text-white mb-6">Bem-vindo ao Caixeiro Viajante</h2>
            <p class="text-blue-100 text-lg mb-8">Conectando pessoas e produtos ao redor do mundo de forma segura e confiável.</p>
            <div class="flex space-x-4">
                <div class="bg-blue-800/30 p-4 rounded-xl backdrop-blur-sm">
                    <p class="text-3xl font-bold text-white mb-1">150+</p>
                    <p class="text-blue-200">Países</p>
                </div>
                <div class="bg-blue-800/30 p-4 rounded-xl backdrop-blur-sm">
                    <p class="text-3xl font-bold text-white mb-1">10k+</p>
                    <p class="text-blue-200">Usuários</p>
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
                <h2 class="text-3xl font-bold text-gray-900">Entrar na conta</h2>
                <p class="mt-2 text-gray-600">Bem-vindo de volta! Por favor, entre com suas credenciais.</p>
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

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-5">
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
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Lembrar-me</label>
                    </div>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">
                        Esqueceu a senha?
                    </a>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Entrar
                </button>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gray-50 text-gray-500">ou</span>
                    </div>
                </div>

                <div class="text-center">
                    <span class="text-gray-600">Não tem uma conta?</span>
                    <a href="{{ route('register') }}" class="ml-1 font-medium text-blue-600 hover:text-blue-500 transition-colors">
                        Criar conta gratuita
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection