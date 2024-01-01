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
        <h1 class="text-3xl text-black pb-6">Table Harga Produk</h1>
        <div class="flex items-center justify-between border-t mt-3 border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="w-full mt-6 mb-6">
            <div class="px-0">
            <div class="grid mb-2 grid-cols-2 gap-5">
                <!-- Kolom 1 -->
                <div class="col-span-1 ml-1">
                    <p class="text-xl pb-3 "><i class="fas fa-list mr-3"></i> Data Harga</p>
                </div>
                <!-- Kolom 3 -->
                <div class="col-span-1  flex items-center justify-end">
                    <a href="{{ route('harga-produk.create') }}" class="ml-96"> <!-- Menggunakan margin untuk jarak dari sisi kiri -->
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
                            <th class="w-1/5 border text-left py-3 px-4 uppercase font-semibold text-sm">START HARGA PRODUK</th>
                            <th class="w-1/5 border text-left py-3 px-4 uppercase font-semibold text-sm">END HARGA PRODUK</th>
                            <th class="w-1/5 border text-left py-3 px-4 uppercase font-semibold text-sm">HARGA PRODUK</th>
                            <th class="w-1/5 border text-left py-3 px-4 uppercase font-semibold text-sm">MENU PRODUK</th>
                            <th class="w-1/5 border text-left py-3 px-4 uppercase font-semibold text-sm">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($harga as $td)
                        <tr>
                            <td class="w-1/5 border border-dark-700 text-left py-3 px-4">{{$td->start_harga}}</td>
                            <td class="w-1/5 border border-dark-700 text-left py-3 px-4">{{$td->end_harga}}</td>
                            <td class="w-1/5 border border-dark-700 text-left py-3 px-4">{{$td->harga_produk}}</td>
                            <td class="w-1/5 border border-dark-700 text-left py-3 px-4">{{$td->product->nama_produk}}</td>
                            <td class="w-1/5 border border-dark-700 text-left py-3 px-4">
                                <div class="flex items-center">
                                    <a href="{{route('harga-produk.edit',$td->id)}}">
                                        <button type="button" class="py-2 px-4 flex justify-center items-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-gray-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            Edit
                                        </button>
                                    </a>
                                    <form action="{{route('harga-produk.destroy',$td->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirmDelete('{{route('harga-produk.destroy',$td->id)}}')" class="ml-2 py-2 px-4 flex justify-center items-center bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pt-3">
                    {{-- {{$produk->links()}} --}}
                </div>
            </div>
        </div>
    </main>
    <script>
        function confirmDelete(url) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                // Lakukan penghapusan data dengan mengarahkan ke URL hapus jika konfirmasi diterima
                window.location.href = url;
            }
        }
    </script>
</x-admin-layout>