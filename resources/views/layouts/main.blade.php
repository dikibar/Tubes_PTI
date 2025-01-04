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
<body class="font-sans">
    {{-- Navbar --}}
    <header class="absolute w-full">
        <nav class="sticky top-0 left-0 z-50 w-full">
            <div class="container flex items-center justify-between px-8 py-4 mx-auto">
                {{-- Brand Logo --}}
                <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-700">
                    <span class="text-yellow-300">Job</span>Finder
                </a>
                {{-- Nav Items --}}
                <div class="items-center hidden space-x-6 lg:flex">
                    
                    <a href="#filter" class="text-sm font-medium text-white transition hover:text-yellow-300">Jobs</a>
                    <a href="#" class="text-sm font-medium text-white transition hover:text-yellow-300">About</a>
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
                <button id="mobileMenuToggle" class="text-black lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            {{-- Mobile Menu --}}
            <div id="mobileMenu" class="hidden bg-blue-600 lg:hidden">
                <div class="flex flex-col items-center py-4 space-y-4">
                    <a href="#company" class="text-sm font-medium text-white transition hover:text-yellow-300">Company</a>
                    <a href="#filter" class="text-sm font-medium text-white transition hover:text-yellow-300">Job</a>
                    <a href="#" class="text-sm font-medium text-white transition hover:text-yellow-300">About</a>
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
    
    {{-- Footer --}}
    <footer class="text-gray-300 bg-gray-800">
        <div class="container px-6 py-10 mx-auto">
            <div class="flex flex-wrap justify-between">
                {{-- Logo & Description --}}
                <div class="w-full mb-6 sm:w-1/3 lg:w-1/4">
                    <a href="{{ url('/') }}" class="text-2xl font-bold text-white hover:text-blue-400">JobFinder</a>
                    <p class="mt-4 text-sm text-gray-400">Find your dream job on our platform. Best opportunities for your career.</p>
                </div>
                {{-- Quick Links  --}}
                <div class="w-full mb-6 sm:w-1/3 lg:w-1/4">
                    <h3 class="mb-4 text-lg font-semibold text-white">Quick Navigation</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                {{-- Contact Info --}}
                <div class="w-full mb-6 sm:w-1/3 lg:w-1/4">
                    <h3 class="mb-4 text-lg font-semibold text-white">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center space-x-2"><svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4m-8-4v4m-2 8H3m18 0h-3m-2-6H6m2 12H6m8-6H6m2-6H6" /></svg><span>Monday - Friday: 9:00 - 17:00</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 2l-4 4m0 0l-4-4m4 4V2m8 12H6m2-6H6m8-6H6m2 12H6m8-6H6m2-6H6" /></svg><span>info@jobfinder.com</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4m-8-4v4m-2 8H3m18 0h-3m-2-6H6m2 12H6m8-6H6m2-6H6" /></svg><span>+62 812 3456 7890</span></li>
                    </ul>
                </div>
                {{-- Social Media --}}
                <div class="w-full sm:w-1/3 lg:w-1/4">
                    <h3 class="mb-4 text-lg font-semibold text-white">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-400 hover:text-white"><svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.5c-.89.4-1.83.66-2.82.78A4.92 4.92 0 0 0 23.34 3a9.94 9.94 0 0 1-3.15 1.21 4.92 4.92 0 0 0-8.4 4.48 13.94 13.94 0 0 1-10.14-5.14 4.92 4.92 0 0 0 1.52 6.56A4.9 4.9 0 0 1 1.6 9v.06a4.92 4.92 0 0 0 3.94 4.82 4.93 4.93 0 0 1-2.22.08 4.92 4.92 0 0 0 4.6 3.42A9.86 9.86 0 0 1 .8 19.48a13.94 13.94 0 0 0 7.55 2.21c9.05 0 14-7.5 14-14 0-.22 0-.43-.02-.65A10.11 10.11 0 0 0 24 4.5z" /></svg></a>
                        <a href="#" class="text-blue-400 hover:text-white"><svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12c0 5.02 3.74 9.18 8.5 9.88v-6.95h-2.2v-2.78h2.2v-1.92c0-2.13 1.28-3.3 3.22-3.3.93 0 1.91.17 1.91.17v2.1h-1.08c-1.06 0-1.39.65-1.39 1.32v1.63h2.36l-.38 2.78h-1.98v6.95C18.26 21.18 22 17.02 22 12c0-5.52-4.48-10-10-10z" /></svg></a>
                        <a href="#" class="text-blue-400 hover:text-white"><svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8.12 12.6l-4.35-4.35 1.41-1.41 2.94 2.94 6.18-6.18 1.41 1.41-7.59 7.59z" /></svg></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 text-center bg-gray-700">
            <p class="text-sm text-gray-400">&copy; 2024 JobFinder. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const dropdownToggle = document.getElementById('dropdownToggle');
            const dropdownMenu = document.getElementById('dropdownMenu');

            // Mobile menu toggle
            mobileMenuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Dropdown toggle for mobile
            if (dropdownToggle && dropdownMenu) {
                dropdownToggle.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (dropdownToggle && dropdownMenu) {
                    if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>
