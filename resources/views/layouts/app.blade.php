<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Caixeiro Viajante - Conectando pessoas e produtos ao redor do mundo">
    <meta name="theme-color" content="#4F46E5">
    
    <title>{{ config('app.name', 'Caixeiro Viajante') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<!-- 🔹 Adicionamos flexbox para garantir que o footer fique no final -->
<body class="font-sans antialiased min-h-screen bg-gray-50 flex flex-col">
    
    <!-- Header -->
    <x-layout.navbar />
    
    <!-- Main Content - Flex Grow faz o conteúdo empurrar o footer para baixo -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <x-layout.footer />

</body>
</html>
