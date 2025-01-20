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
                    <x-layout.nav-link href="#">Avaliações</x-layout.nav-link>
                </div>
            </div>

            <!-- Botões de Autenticação -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- Exibe os botões de "Entrar" e "Cadastrar" apenas para visitantes -->
                @guest
                    <x-button.primary href="/login">Entrar</x-button.primary>
                    <x-button.secondary href="/register" class="ml-4">Cadastrar</x-button.secondary>
                @endguest

                <!-- Exibe o botão "Sair" para usuários autenticados -->
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Sair
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
