<x-admin-layout>
    <main class="w-full flex-grow p-6">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-cloak class="absolute top-0 right-0 mt-20 mr-6">
                <div class="max-w-sm w-full bg-green-100 border-l-4 border-green-500 shadow-md rounded-md flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <div class="text-green-500 rounded-full bg-white mr-3">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="ml-3 text-lg focus:outline-none">&times;</button>
                </div>
            </div>
        @endif

        <!-- Alert untuk pesan error -->
        @if(session('error'))
            <div x-data="{ show: true }" x-show="show" x-cloak class="absolute top-0 right-0 mt-20 mr-6">
                <div class="max-w-sm w-full bg-red-100 border-l-4 border-red-500 shadow-md rounded-md flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <div class="text-red-500 rounded-full bg-white mr-3">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false" class="ml-3 text-lg focus:outline-none">&times;</button>
                </div>
            </div>
        @endif       
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>
        <div class="grid grid-cols-4 sm:grid-cols-4 xl:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="w-full px-6 sm:w-1/4 xl:w-1/4">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                        <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/salad.png" alt="salad"/>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalProdukMakanan }}</h4>
                        <div class="text-gray-500 text-sm">Total Menu Makanan</div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="w-full px-6 sm:w-1/4 xl:w-1/4">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                        <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/milk-bottle.png" alt="milk-bottle"/>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalProdukMinuman }}</h4>
                        <div class="text-gray-500 text-sm">Total Menu Minuman</div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="w-full px-6 sm:w-1/4 xl:w-1/4">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                        <img width="40" height="40" src="https://img.icons8.com/ios-filled/50/FFFFFF/gender-neutral-user.png" alt="gender-neutral-user"/>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$totalPengguna}}</h4>
                        <div class="text-gray-500 text-sm">Total Pengguna</div>
                    </div>
                </div>
            </div>
    
            <!-- Card 4 -->
            <div class="w-full px-6 sm:w-1/4 xl:w-1/4">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                        <img width="50" height="50" src="https://img.icons8.com/sf-black-filled/64/FFFFFF/admin-settings-male.png" alt="admin-settings-male"/>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalAdmin }}</h4>
                        <div class="text-gray-500 text-sm">Total Admin</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between border-t mt-3 border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="w-full mt-6 mb-6">
            <div class="px-0">
            <div class="grid mb-2 grid-cols-3 gap-5">
                <!-- Kolom 1 -->
                <div class="col-span-1 ml-1">
                    <p class="text-xl pb-3 "><i class="fas fa-list mr-3"></i> Data Produk</p>
                </div>
            
                <!-- Kolom 2 -->
                <div class="col-span-1 flex items-center justify-center">
                    <!-- PENCARIAN -->
                    <form action="{{ route('admin.index') }}" method="GET" class="flex items-center">   
                        <select id="id_kategori" name="id_kategori" class="w-full mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{$item->id_kategori}}" {{(isset($_GET['id_kategori']) && $_GET['id_kategori']==$item->id_kategori)?'selected':''}}>{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            </div>
                            <input type="text" name="s" value="{{(isset($_GET['s']))?$_GET['s']:''}}" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                        </div>
                        <button type="submit" class="p-2.5 ms-2 ml-3 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                    <!-- END PENCARIAN -->
                </div>

                <!-- Kolom 3 -->
                <div class="col-span-1 flex items-center justify-center">
                    <a href="{{ route('admin.create') }}" class="ml-60"> <!-- Menggunakan margin untuk jarak dari sisi kiri -->
                        <button type="button" class="py-2 px-2 flex justify-center items-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                            +Tambah Data
                        </button>
                    </a>
                </div>
            </div>     
            <div class="bg-white overflow-auto">
                <table class="border-collapse  min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">GAMBAR PRODUK</th>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">NAMA PRODUK</th>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">DESKRIPSI</th>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">HARGA DEFAULT</th>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">STOK</th>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">KATEGORI</th>
                            <th class="w-1/7 border text-left py-3 px-4 uppercase font-semibold text-sm">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($produk as $key=>$td)
                        <tr>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4"><img class="h-20 w-30" src="{{asset($td->gambar_produk)}}" alt=""></td>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4">{{$td->nama_produk}}</td>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4">{!! Str::limit($td->desk_produk,20)!!}</td>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4">{{$td->harga_produk}}</td>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4">{{$td->stok_produk}}</td>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4">{{$td->kategori->nama_kategori}}</td>
                            <td class="w-1/7 border border-dark-700 text-left py-3 px-4">
                                <div class="flex items-center">
                                    <a href="{{route('admin.edit',$td->id_produk)}}">
                                        <button type="button" class="py-2 px-4 flex justify-center items-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-gray-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            Edit
                                        </button>
                                    </a>
                                    <form id="deleteForm" action="{{route('admin.destroy', $td->id_produk)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="ml-2 py-2 px-4 flex justify-center items-center bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg" value="delete" onclick="confirmDelete()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pt-3">
                    {{$produk->links()}}
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete() {
            // Menampilkan SweetAlert untuk konfirmasi penghapusan
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, melanjutkan dengan penghapusan
                    document.getElementById('deleteForm').submit();
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</x-admin-layout>