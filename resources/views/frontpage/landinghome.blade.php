<x-home-layout>  
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('https://www.prestasiglobal.id/wp-content/uploads/2020/03/Blog-9-980x551.jpg')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">KAMU UDAH SEHAT?</h2>
                        <p class="mt-2 text-gray-300"> pilihan makanan yang memberikan nutrisi seimbang bagi tubuh dan membantu menjaga kesehatan secara keseluruhan. </p>
                        <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Shop Now</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:flex mt-8 md:-mx-4">
                <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('https://img.antaranews.com/cache/1200x800/2020/12/01/istockphoto-1188697144-170667a_copy_800x533.jpg.webp')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Minuman KesukaanMU</h2>
                            <p class="mt-2 text-gray-300">Minuman datang dalam beragam jenis dan rasa, memberikan kesegaran dan kenikmatan bagi lidah serta tubuh kita.</p>
                            <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Shop Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>  
                <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('https://img-cdn.medkomtek.com/AsE0EwwrCST5MugQrY7GqThude0=/0x0/smart/filters:quality(100):format(webp)/article/kUNBuEsZPdFlNMQna2SNc/original/004254700_1603357822-Kreasi-Menu-Sarapan-yang-Sehat-dan-Praktis-shutterstock_1690348006.jpg')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Jangan Lupa Sarapan</h2>
                            <p class="mt-2 text-gray-300">Sarapan adalah langkah awal yang luar biasa untuk memulai hari dengan energi dan semangat yang tinggi.</p>
                            <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Shop Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="app">
                <div class="mt-16">
                    <div class="flex justify-between items-center mt-16">
                        <h3 class="text-gray-600 text-2xl font-medium">Makanan Sehat</h3>
                        <a href="/produk-makanan" class="text-blue-600 hover:text-blue-700">See All</a>
                    </div>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <div v-for="item in makananItems" :key="item.id_produk" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <!-- Konten untuk makanan -->
                            <a :href="'/produk/' + item.id_produk" class="relative">
                                <div class="relative">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover transition-all duration-300" :style="{ 'background-image': 'url(' + item.gambar_produk + ')', 'filter': 'blur(800)' }">
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        <span class="text-white text-lg font-bold">See Detail</span>
                                    </div>
                                </div>
                            </a>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">@{{ item.nama_produk }}</h3>
                                <span class="text-gray-500 mt-2">Rp.@{{ item.harga_produk }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <div class="flex justify-between items-center mt-16">
                        <h3 class="text-gray-600 text-2xl font-medium">Minuman Sehat</h3>
                        <a href="/produk-minuman" class="text-blue-600 hover:text-blue-700">See All</a>
                    </div>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <div v-for="item in minumanItems" :key="item.id_produk" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <!-- Konten untuk minuman -->
                            <a :href="'/produk/' + item.id_produk" class="relative">
                                <div class="relative">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover transition-all duration-300" :style="{ 'background-image': 'url(' + item.gambar_produk + ')', 'filter': 'blur(800)' }">
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        <span class="text-white text-lg font-bold">See Detail</span>
                                    </div>
                                </div>
                            </a>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">@{{ item.nama_produk }}</h3>
                                <span class="text-gray-500 mt-2">Rp.@{{ item.harga_produk }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    items: [] // Holds data from the API
                };
            },
            computed: {
                makananItems() {
                    return this.items.filter(item => item.id_kategori === 1);
                },
                minumanItems() {
                    return this.items.filter(item => item.id_kategori === 2);
                }
            },
            mounted() {
                this.fetchData(); // Call method to fetch data from the API when the component is mounted
            },
            methods: {
                async fetchData() {
                    try {
                        const response = await axios.get('/api/produk');

                        const makananItems = response.data.filter(item => item.id_kategori === 1).slice(0, 4);
                        const minumanItems = response.data.filter(item => item.id_kategori === 2).slice(0, 4);

                        this.items = [...makananItems, ...minumanItems];

                        // Iterate through the items and fetch their prices
                        for (const item of this.items) {
                            const hargaProduk = await this.getHargaProduk(item.id_produk);
                            if (hargaProduk.hasOwnProperty('harga_produk')) {
                                item.harga_produk = hargaProduk.harga_produk; // Assign the fetched price to the item
                            } else if (hargaProduk.hasOwnProperty('harga_produk_default')) {
                                item.harga_produk = hargaProduk.harga_produk_default; // Assign the default price to the item
                            } else {
                                item.harga_produk = 'Error'; // Set an error message if price retrieval fails
                            }
                        }
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                },
                async getHargaProduk(id_produk) {
                    try {
                        const response = await axios.get(`/api/produk/${id_produk}/harga`);
                        return response.data; // Return the response directly
                    } catch (error) {
                        console.error('Error fetching data', error);
                        return { 'error': 'Error' }; // Return an error object if fetching fails
                    }
                },
            },
        });
    </script>
</x-home-layout>   