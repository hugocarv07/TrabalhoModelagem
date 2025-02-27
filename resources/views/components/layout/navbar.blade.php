<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo e Links de Navegação -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Caixeiro Viajante">
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <x-layout.nav-link href="/" :active="request()->is('/')">Home</x-layout.nav-link>
                    <x-layout.nav-link href="/vendedores" :active="request()->is('vendedores')">Vendedores</x-layout.nav-link>
                    <x-layout.nav-link href="/como-funciona">Como Funciona</x-layout.nav-link>
                    <x-layout.nav-link href="{{ route('reviews.list') }}" :active="request()->is('avaliacoes')">
                        Avaliações
                    </x-layout.nav-link>
                </div>
            </div>

            <!-- 🔹 Pedidos e Botão de Logout -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-6">
            @auth
    @if(auth()->user()->is_contributor)
            <a class="nav-link" href="{{ route('product-requests.index') }}">
                <i class="fa-solid fa-cart-shopping"></i> Pedidos
            </a>
    @endif
@endauth
@auth
    @if(auth()->user()->is_contributor)
            <a class="nav-link" href="{{ route('proposals.accepted') }}">
                <i class="fas fa-file-contract"></i> Minhas Propostas
            </a>
    @endif
@endauth

            
                @auth
                    @if(Auth::user()->is_admin)
                        <!-- 🔹 Apenas administradores veem "Pedidos do Site" -->
                        <x-layout.nav-link href="{{ route('product-requests.allOrders') }}" class="text-blue-700">
                            Pedidos do Site
                        </x-layout.nav-link>

                        <!-- 🔹 Painel Administrativo para Admin -->
                        <x-layout.nav-link href="{{ route('admin.dashboard') }}" class="text-blue-700">
                            Painel Adm
                        </x-layout.nav-link>
                    @else
                        <!-- 🔹 Apenas usuários comuns veem "Minhas Encomendas" -->
                        <x-layout.nav-link href="{{ route('product-requests.myOrders') }}" class="font-semibold text-gray-700 hover:text-gray-900">
                            Minhas Encomendas
                        </x-layout.nav-link>
                    @endif
                @endauth

                <!-- 🔹 Botão de Logout -->
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Sair
                        </button>
                    </form>
                @endauth

                <!-- 🔹 Botões de Login e Cadastro para Visitantes -->
                @guest
                    <x-button.primary href="/login">Entrar</x-button.primary>
                    <x-button.secondary href="/register" class="ml-4">Cadastrar</x-button.secondary>
                @endguest
            </div>
        </div>
    </div>
</nav>
