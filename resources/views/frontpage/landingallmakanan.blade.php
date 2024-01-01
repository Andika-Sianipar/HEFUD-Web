<x-home-layout>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div id="app">
                <div class="flex justify-between items-center">
                    <a href="/" class="inline-block bg-blue-600 hover:bg-blue-500 focus:bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none">Back to Home</a>
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

                        const makananItems = response.data.filter(item => item.id_kategori === 1).slice(0, 100);
                        const minumanItems = response.data.filter(item => item.id_kategori === 2).slice(0, 0);

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