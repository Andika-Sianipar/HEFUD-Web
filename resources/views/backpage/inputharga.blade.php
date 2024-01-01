<x-admin-layout>
    <main class="w-full flex-grow p-6">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-list mr-3"></i> {{$title}}
                </p>
                <div class="leading-loose">
                    <form method="POST" action="{{ isset($harga) ? route('harga-produk.update', $harga->id) : route('harga-produk.store') }}" class="p-10 w-1/2 bg-white rounded shadow-xl">
                        @csrf
                        @if(isset($harga))
                            @method('PUT')
                        @endif
                    
                        <div class="form-group">
                            <label class="block text-sm text-gray-600" for="start_harga">Start Harga</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="date" class="form-control" id="start_harga" name="start_harga" required
                                   value="{{ old('start_harga', isset($harga) ? $harga->start_harga : '') }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="block text-sm text-gray-600" for="end_harga">End Harga</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="date" class="form-control" id="end_harga" name="end_harga" required
                                   value="{{ old('end_harga', isset($harga) ? $harga->end_harga : '') }}">
                        </div>
                    
                        <div class="form-group">
                            <label class="block text-sm text-gray-600" for="harga_produk">Harga Produk</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" class="form-control" id="harga_produk" name="harga_produk" required
                                   value="{{ old('harga_produk', isset($harga) ? $harga->harga_produk : '') }}">
                        </div>
                    
                        <div class="form-group">
                            <label class="block text-sm text-gray-600" for="id_produk">Produk</label>
                            <select  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="id_produk" name="id_produk" required>
                                <option value="" disabled selected>-Pilih Produk-</option>
                                @foreach($produk as $item)
                                    @if($item->nama_produk === 'Menu Makanan')
                                        <!-- This option won't be selectable -->
                                        <option value="{{ $item->id_produk }}" disabled>{{ $item->nama_produk }}</option>
                                    @else
                                        <option value="{{ $item->id_produk }}" 
                                                {{ (isset($harga) && $item->id_produk === $harga->id_produk) || old('id_produk') == $item->id_produk ? 'selected' : '' }}>
                                            {{ $item->nama_produk }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" type="submit" class="btn btn-primary">{{ isset($harga) ? 'Update' : 'Tambah Data' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>