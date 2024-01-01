<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" >
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" /> --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('admin.index') }}" class="{{ Request::is('admin*') ? 'active-nav-link' : '' }} flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <!-- Dropdown -->
            <!-- Tambahkan ID unik pada dropdown -->
            <button type="button" class="w-full flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example2">
                <i class="fas fa-table mr-3"></i>
                Menu 
                <i class="fas fa-caret-down ml-24"></i>
            </button>
            <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                <!-- Tautan dropdown dengan ID unik -->
                <li>
                    <a id="harga-produk-dropdown" href="{{ route('harga-produk.index') }}" class="{{ Request::is('harga-produk*') ? 'active-nav-link' : '' }} flex items-center w-full p-2 text-white transition duration-75 pl-11 group hover:bg-gray-100 nav-item">Harga Produk</a>
                </li>
                <!-- Tautan dropdown lainnya -->
            </ul>
            <!-- End Dropdown -->
            <a href="/forms" class="{{ Request::is('forms*') ? 'active-nav-link' : '' }} flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a>
            <a href="/tab" class="{{ Request::is('tab*') ? 'active-nav-link' : '' }} flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tabbed Content
            </a>
        </nav>
    </aside>
    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full  items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2 justify-start">
                <div class="text-gray-900 text-xl"> <!-- Mengatur ukuran teks dan posisi -->
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" @click.away="isOpen = false" class="relative z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://cdn-icons-png.flaticon.com/512/9703/9703596.png">
                </button>
                <div x-show="isOpen" @click.away="isOpen = false" class="absolute bg-white rounded-lg shadow-lg py-1 px-5 mt-1 right-0" style="top: 48px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block px-4 py-2 account-link font-bold hover:text-gray-900" @click="isOpen = false">Logout</button>
                    </form>
                </div>
            </div>
        </header>
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            {{$slot}}
            <footer class="w-full bg-white text-right p-4">  
            </footer>
        </div>
    </div>
    
<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script>
    const searchInput = document.getElementById('searchInput');
    const table = document.querySelector('table');
    const rows = table.querySelectorAll('tbody tr');

    searchInput.addEventListener('keyup', function () {
        const searchText = searchInput.value.toLowerCase();

        rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchText)) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
        });
    });
</script>
<script>
   document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.href;

    // Periksa URL dan tampilkan dropdown yang sesuai saat dokumen dimuat
    if (currentUrl.includes("harga-produk")) {
        document.getElementById("dropdown-example2").classList.remove("hidden");
        document.getElementById("harga-produk-dropdown").classList.add("active-nav-link");
    } else {
        document.getElementById("dropdown-example2").classList.add("hidden");
    }
});
</script>
</body>
</html>