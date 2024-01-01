<x-home-layout>
  <div id="app" class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pt-2 pb-6">
              <h1 class="text-4xl font-bold tracking-tight text-gray-900">Detail Produk</h1>
              <div class="flex items-center">
                <!-- Konten tambahan di bagian atas -->
              </div>
            </div>
            <div class="container mx-auto p-4">
              <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
                <div class="lg:col-span-3 lg:row-end-1">
                  <div class="lg:flex lg:items-start">
                    <div class="lg:order-2 lg:ml-5 relative">
                      <div class="relative">
                        <img :src="'{{ asset('') }}' + product.gambar_produk" alt="" style="max-width: 100%;">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Bagian Detail Produk -->
                <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
                  <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">@{{ product.nama_produk }}</h1>
                  <div class="mt-5 flex items-center">
                    <div class="flex items-center">
                      <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                      </svg>
                      <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                      </svg>
                      <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                      </svg>
                      <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                      </svg>
                      <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                      </svg>
                    </div>
                    <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
                  </div>
                  <div class="mt-8 flex items-center">
                    <h2 class="mr-3 text-base text-gray-900">Stok: @{{ product.stok_produk }} </h2>
                  </div>
                  <div class="mt-8 flex items-center">
                    <h2 class="mr-3 text-base text-gray-900">Category:</h2>
                    <button type="button" class="text-white bg-[#000000] hover:bg-[#1F2937]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-3 py-1 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                      <a v-if="product.id_kategori === 1" href="/produk-makanan">
                        <span>Makanan</span>
                      </a>
                      <a v-else-if="product.id_kategori === 2" href="/produk-minuman">
                        <span>Minuman</span>
                      </a>
                      <a v-else>
                        <span>Tidak Diketahui</span>
                      </a>                      
                    </button>
                  </div>
                  <div class="mt-8 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                    <div class="flex items-end">
                      <h1 class="text-3xl font-bold">Rp.@{{ product.harga_produk }}</h1><p>/pcs</p>
                    </div>
                    <button @click="addToCart(product.id_produk)" type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-8 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                      <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                      </svg>
                      Add to cart
                    </button>
                  </div>
                  <ul class="mt-8 space-y-2">
                    <li class="flex items-center text-left text-sm font-medium text-gray-600">
                      <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
                      </svg>
                      Free shipping worldwide
                    </li>
                    <li class="flex items-center text-left text-sm font-medium text-gray-600">
                      <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
                      </svg>
                      Cancel Anytime
                    </li>
                  </ul>
                  <!-- Konten Detail Produk -->
                </div>
                <!-- Bagian Review -->
                <div class="lg:col-span-5">
                  <div class="border-b border-gray-300">
                    <nav class="flex gap-9">
                      <a href="#" :class="{ 'font-bold border-gray-900': showDescription, 'text-xl': showDescription,  'text-gray-900': showDescription, 'hover:border-gray-400': showDescription, 'hover:text-gray-800': showDescription, 'text-gray-500': !showDescription }" @click="showDescription = true; showReviews = false;">Description</a>
                      <span class="mr-3 ml-3">|</span>
                      <a href="#" :class="{ 'font-bold border-gray-900': showReviews, 'text-xl': showReviews, 'text-gray-900': showReviews, 'hover:border-gray-400': showReviews, 'hover:text-gray-800': showReviews, 'text-gray-500': !showReviews }" @click="showDescription = false; showReviews = true;">Reviews</a>
                    </nav>
                  </div>
                  <div v-if="showDescription" class="w-full mt-3 mr-3">
                    <!-- Konten Deskripsi Produk -->
                    <div class="max-w-s mx-auto bg-white p-8 rounded-lg shadow-lg">
                      <h1 class="text-2xl font-bold mb-4 text-center text-black-600">Product Description</h1>
                      <p v-html="product.desk_produk"></p>
                    </div>
                  </div>
                  <div v-if="showReviews" class="flex justify-center">
                    <!-- Konten Ulasan -->
                    <div class="w-full lg:w-1/2 mt-3 lg:mt-0 mr-3">
                      <!-- Submit Review Section -->
                      <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h1 class="text-2xl font-bold mb-4 text-center text-black-600">Rate This Product!</h1>
                        <div class="mb-4">
                          <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                          <input type="text" id="username" v-model="username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                          <label for="review" class="block text-sm font-medium text-gray-600">Review:</label>
                          <textarea id="review" v-model="review" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                          <label for="rating" class="block text-sm font-medium text-gray-600">Rating:</label>
                          <div class="flex items-center">
                            <span v-for="star in 5" :key="star" @click="setRating(star)" :class="{ 'text-yellow-500 cursor-pointer': rating >= star, 'cursor-pointer': rating < star }" style="font-size: 24px;">&#9733;</span>
                          </div>
                        </div>
                        <button @click="addReview" class="bg-black text-white font-semibold px-4 py-2 rounded-md hover:bg-gray-600">Submit</button>
                      </div>
                    </div>
                    <div class="w-full lg:w-1/2 mt-3 lg:mt-0 bg-white shadow-md rounded-lg p-6" style="max-height: 460px; overflow-y: auto;">
                      <h2 class="text-2xl text-center underline mr-3 pt-2 font-bold mb-3 text-black-600">Reviews</h2>
                      <ul>
                        <li v-for="(item, index) in reviews" :key="index" class="mb-4 border-b pb-4">
                          <strong class="text-black-600">@{{ item.username }}</strong>
                          <div class="flex items-center mt-2">
                            <div class="text-yellow-500" v-html="printRating(item.rating)"></div>
                          </div>
                          <p class="text-gray-700" style="word-wrap: break-word;">@{{ item.review }}</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>
    <script>
      new Vue({
        el: '#app',
        data: {
          username: '',
          review: '',
          rating: 0,
          reviews: [],
          showDescription: true,
          showReviews: false,
          product: {} // Data produk dari API akan disimpan di sini
        },
        methods: {
          addToCart(productId) {
            axios.post('/api/cart/add', {
              id_produk: productId,
              // other relevant data for adding to cart
            })
            .then(response => {
              console.log('Product added to cart:', response.data);
              // handle successful response, e.g., update UI or show a success message
            })
            .catch(error => {
              console.error('Error adding product to cart:', error.response.data);
              // handle error, e.g., show error message to the user
            });
          },

          addReview: function() {
            if (this.username.trim() !== '' && this.review.trim() !== '' && this.rating !== 0) {
              this.reviews.push({ username: this.username, review: this.review, rating: this.rating });
              this.username = '';
              this.review = '';
              this.resetRating();
            } else {
              alert('Harap isi semua kolom dan pilih rating sebelum menambahkan review.');
            }
          },
    
          setRating: function(rating) {
            if (this.rating === rating) {
              this.resetRating();
            } else {
              this.rating = rating;
            }
          },
    
          printRating: function(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
              if (i <= rating) {
                stars += '<span class="text-yellow-500">&#9733</span>'; // Menggunakan warna kuning untuk bintang terisi
              } else {
                stars += '<span class="text-gray-300">&#9733</span>'; // Menggunakan warna abu-abu untuk bintang kosong
              }
            }
            return stars;
          },
    
          resetRating: function() {
            this.rating = 0;
          },
          
          toggleDescription: function() {
            this.showDescription = true;
            this.showReviews = false;
          },
    
          toggleReviews: function() {
            this.showDescription = false;
            this.showReviews = true;
          },
    
          fetchData: function() {
            const url = new URL(window.location.href);
            const id_produk = url.pathname.split('/').pop();
            const self = this; // Tetapkan variabel self untuk menyimpan konteks Vue
            
            axios.get(`/api/produk/${id_produk}`)
              .then(async function(response) {
                self.product = response.data; // Gunakan variabel self untuk merujuk ke konteks Vue
                console.log(response.data);

                // Setelah mendapatkan data produk, panggil harga produk
                await self.getHargaProduk(id_produk);
              })
              .catch(error => {
                console.error('There was an error!', error);
              });
          },
          async getHargaProduk(id_produk) {
            try {
              const response = await axios.get(`/api/produk/${id_produk}/harga`);
              let formattedPrice = '';

              if (response.data && response.data.harga_produk) {
                formattedPrice = this.processPrice(response.data.harga_produk);
              } else if (response.data && response.data.harga_produk_default) {
                formattedPrice = this.processPrice(response.data.harga_produk_default);
              } else {
                throw new Error('Invalid price format');
              }

              this.product.harga_produk = formattedPrice; // Assign hasil proses format harga ke data produk
              console.log(formattedPrice);
            } catch (error) {
              console.error('Error fetching data', error);
              this.product.harga_produk = { 'error': 'Error' }; // Assign an error object if fetching fails
            }
          },
          processPrice(rawPriceData) {
            // Lakukan pengolahan format harga di sini
            // Contoh: Ubah format harga dari "25.000" menjadi string "25.000"
            if (typeof rawPriceData === 'string') {
              const formattedPrice = rawPriceData.replace(".", ","); // Ubah titik menjadi koma jika diperlukan
              return formattedPrice;
            } else {
              return { 'error': 'Invalid price format' }; // Atur objek error jika format tidak sesuai
            }
          },
        },
        mounted() {
          this.fetchData(); // Panggil fungsi untuk mengambil data produk saat aplikasi dimuat
        }
      });
    </script>
  </x-home-layout>    
                   