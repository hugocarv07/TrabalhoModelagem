<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Caixeiro Viajante">
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <x-layout.nav-link href="#" :active="true">Home</x-layout.nav-link>
                    <x-layout.nav-link href="#">Vendedores</x-layout.nav-link>
                    <x-layout.nav-link href="#">Como Funciona</x-layout.nav-link>
                    <x-layout.nav-link href="#">Avaliações</x-layout.nav-link>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <x-button.primary href="#">Entrar</x-button.primary>
                <x-button.secondary href="#" class="ml-4">Cadastrar</x-button.secondary>
            </div>
        </div>
    </div>
</nav>