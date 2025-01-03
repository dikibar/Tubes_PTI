<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JobFinder')</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="font-sans bg-gray-100">
    {{-- Navbar --}}
    <header>
        <nav class="fixed top-0 left-0 z-50 w-full shadow-md bg-gradient-to-r from-blue-700 to-blue-800">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                {{-- Brand Logo --}}
                <a href="{{ url('/') }}" class="text-2xl font-bold text-white">
                    <span class="text-yellow-300">Job</span>Finder
                </a>
                {{-- Nav Items --}}
                <div class="items-center hidden space-x-6 lg:flex">
                    @auth
                    {{-- User Dropdown --}}
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-white hover:text-yellow-300" onclick="toggleDropdown()" id="dropdownToggle">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </button>
                        <div id="dropdownMenu" class="absolute right-0 z-10 hidden w-40 py-2 mt-2 bg-white rounded-lg shadow-lg">
                            <a href="{{ route('index') }}" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">
                                Home
                            </a>
                            <a href="{{ route('profile') }}" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    {{-- If not logged in, show Login button --}}
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-blue-700 transition bg-yellow-400 rounded-lg shadow-md hover:bg-yellow-500">
                        Login
                    </a>
                    @endauth
                </div>
                {{-- Mobile Menu Toggle --}}
                <button id="mobileMenuToggle" class="text-white lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            {{-- Mobile Menu --}}
            <div id="mobileMenu" class="hidden bg-blue-600 lg:hidden">
                <div class="flex flex-col items-center py-4 space-y-4">
                    <a href="{{ route('index') }}" class="text-sm font-medium text-white transition hover:text-yellow-300">Home</a>
                    <a href="{{ route('profile') }}" class="text-sm font-medium text-white transition hover:text-yellow-300">Profile</a>
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-white transition hover:text-yellow-300">Logout</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-blue-700 transition bg-yellow-400 rounded-lg shadow-md hover:bg-yellow-500">
                        Login
                    </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>
    
    {{-- Content --}}
    <main>@yield('content')</main>
    
    @stack('scripts')
    <script>
        // Toggle dropdown menu
        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }

        // Close dropdown menu when clicking outside
        window.addEventListener('click', function (e) {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownToggle = document.getElementById('dropdownToggle');

            if (!dropdownMenu.contains(e.target) && !dropdownToggle.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Toggle mobile menu
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuToggle.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        window.addEventListener('click', function (e) {
            if (!mobileMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>