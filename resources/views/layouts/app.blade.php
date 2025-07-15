<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD with Livewire</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900">Laravel CRUD</h1>
        </div>
    </header>
    <!-- Main Content -->
    <main class="py-6">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-600">
                    Return to Website:
                    <a href="https://www.usjr.edu.ph/" class="text-blue-600 hover:text-blue-800 font-semibold">
                        University of San Jose - Recoletos
                    </a>
                </p>
            </div>
        </div>
    </footer>
    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
