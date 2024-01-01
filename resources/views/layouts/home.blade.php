<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Situs ini tempat menjual makanan dan minuman sehat">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hefud-Shop</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="{{ asset('js/cart.js') }}" defer></script>
     <!-- Vue.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <style>
        .fade-enter-active,
        .fade-leave-active {
            transition: opacity 0.5s;
        }

        .fade-enter,
        .fade-leave-to {
            opacity: 0;
        }

        .w-full:hover .bg-cover {
            filter: blur(5px); /* Ubah nilai blur sesuai kebutuhan Anda */
         }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div x-data="{ isOpen: false, cartOpen: false }" class="bg-white">
            <div class="container mx-auto px-6 py-5">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        <i class="material-icons">person</i>
                        @if(Auth::check())
                            <span class="mx-1 text-sm">{{ Auth::user()->name }}</span> |
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="mx-1 text-sm">Logout</button>
                            </form>
                        @else
                            <!-- Tindakan alternatif jika pengguna tidak login -->
                            <span class="mx-1 text-sm">
                                <a href="/login">Login</a> |
                                <a href="/register">Register</a>
                            </span>
                        @endif
                    </div>
                    <div class="flex md:justify-center justify-start w-full">
                        <img src="{{ asset('images/logo1.png') }}" alt="Deskripsi Gambar" class="md:w-24 w-16 h-auto">
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-9 w-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </button>
                        <div class="flex sm:hidden">
                            <button @click="isOpen = !isOpen" type="button"
                                class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-3">
                    <div class="flex flex-col sm:flex-row">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" 
                            class="mt-3 text-gray-600 sm:mx-3 sm:mt-0">{{ __('Home') }}</x-nav-link>
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')"
                            class="mt-3 text-gray-600 sm:mx-3 sm:mt-0">{{ __('Contact') }}</x-nav-link>
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')"
                            class="mt-3 text-gray-600 sm:mx-3 sm:mt-0">{{ __('About') }}</x-nav-link>
                    </div>
                </nav>
                @if(\Route::currentRouteName() === 'allmakanan' || \Route::currentRouteName() === 'allminuman')
                    <div class="relative mt-6 max-w-lg mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <input
                            class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Search">
                    </div>
                @endif
            </div>
            <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
                class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <hr class="my-3">
                <div class="flex justify-between mt-6">
                    <div class="flex">
                        <img class="h-20 w-20 object-cover rounded"
                            src="https://media.suara.com/pictures/653x366/2016/05/23/o_1ajds7pv9uhhlsn1mb41jvu9iha.jpg"
                            alt="">
                        <div class="mx-3">
                            <h3 class="text-sm text-gray-600">Salad</h3>
                            <div class="flex items-center mt-2">
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                                <span class="text-gray-700 mx-2">2</span>
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <span class="text-gray-600">20$</span>
                </div>
                {{-- <div class="mt-8">
                    <form class="flex items-center justify-center">
                        <input class="form-input w-48" type="text" placeholder="Add promocode">
                        <button
                            class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Apply</span>
                        </button>
                    </form>
                </div> --}}
                <a class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Checkout</span>
                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
        <main>
            {{ $slot }}
        </main>
        <footer class="bg-white">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#"><img src="{{ asset('images/logo1.png') }}" alt="Deskripsi Gambar"
                        class="w-16 h-auto"></a>
                <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>
    </div>
</body>

</html>
