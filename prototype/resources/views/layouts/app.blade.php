<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app">
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Brand -->
                    <a class="text-xl font-bold text-gray-800 no-underline hover:text-gray-700" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <!-- Hamburger Button (Mobile) -->
                    <button id="navbar-toggler" type="button" class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Navbar Links -->
                    <div id="navbar-collapse" class="hidden w-full md:flex md:w-auto md:items-center">
                           @auth
       <div class="flex items-center space-x-3 mr-4">
           <span class="text-sm text-gray-700">
               Bonjour, {{ Auth::user()->name }}
           </span>

           @role('admin')
               <span class="inline-flex items-center rounded-full bg-red-600 px-2.5 py-0.5 text-xs font-semibold text-white">
                   Admin
               </span>
           @endrole
            @role('auteur')
               <span class="inline-flex items-center rounded-full bg-sky-600 px-2.5 py-0.5 text-xs font-semibold text-white">
                   Auteur
               </span>
           @endrole
       </div>
   @endauth

                        <ul class="flex flex-col md:flex-row md:space-x-6 list-none m-0 p-0 items-center">
                            <!-- Left Side Of Navbar -->
                            <!-- You can add left-side links here -->

                            <!-- Right Side Of Navbar -->
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a class="block py-2 md:py-0 text-gray-600 hover:text-blue-600 transition" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li>
                                        <a class="block py-2 md:py-0 text-gray-600 hover:text-blue-600 transition" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="relative">
                                    <a id="navbarDropdown" class="flex items-center cursor-pointer py-2 md:py-0 text-gray-600 hover:text-gray-800" href="#" role="button">
                                        {{ Auth::user()->name }}
                                        <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu -->
                                    <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5">
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                
                <!-- Mobile Menu (Visible only when toggled) -->
                <div id="mobile-menu" class="hidden md:hidden pb-4">
                    <ul class="flex flex-col space-y-2">
                        @guest
                             @if (Route::has('login'))
                                <li>
                                    <a class="block px-4 py-2 text-gray-600 hover:bg-gray-100 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li>
                                    <a class="block px-4 py-2 text-gray-600 hover:bg-gray-100 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="border-t pt-2">
                                <div class="px-4 py-2 text-xs text-gray-400 font-semibold uppercase">
                                    {{ Auth::user()->name }}
                                </div>
                                <a class="block px-4 py-2 text-gray-600 hover:bg-gray-100" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-10">
            @yield('content')
        </main>
    </div>

    <!-- Scripts to handle Navbar Interaction -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle Mobile Menu
            const toggler = document.getElementById('navbar-toggler');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if(toggler && mobileMenu) {
                toggler.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Toggle User Dropdown (Desktop)
            const dropdownBtn = document.getElementById('navbarDropdown');
            const dropdownMenu = document.getElementById('dropdown-menu');

            if (dropdownBtn && dropdownMenu) {
                dropdownBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    dropdownMenu.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', (e) => {
                    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>