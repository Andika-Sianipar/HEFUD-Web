<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tb_harga_produk;
use App\Models\Tb_produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ApiHomeController extends Controller
{
    public function indexhome() 
    {
        $produk = Tb_produk::all();
        return response()->json($produk,200);
    }

    public function indexdetail($id) 
    {
        $produk = Tb_produk::find($id);
        return response()->json($produk,200);
    }

    public function getHargaProduk($id) 
    {
        $currentDate = now(); // Tanggal saat ini
        Log::info('Current Date: ' . $currentDate);
        // Cari harga produk berdasarkan tanggal saat ini
        $hargaProduk = Tb_harga_produk::where('id_produk', $id)
            ->where('start_harga', '<=', $currentDate)
            ->where('end_harga', '>=', $currentDate)
            ->first();
        Log::info('Harga Produk: ' . $hargaProduk);
        if (!$hargaProduk) {
            // Jika tidak ada harga yang sesuai, kembalikan harga default produk
            $produk = Tb_produk::findOrFail($id);
            $defaultHarga = $produk->harga_produk;
            return response()->json(['harga_produk_default' => $defaultHarga]);
        }

        return response()->json(['harga_produk' => $hargaProduk->harga_produk]);
    }

    // public function addToCartApi(Request $request, $id)
    // {
    //     // Session::start();
    //     $produk = Tb_produk::findOrFail($id);

    //     // Mendapatkan keranjang dari sesi
    //     $cart = Session::get('cart', []);

    //     // Jika produk sudah ada di dalam keranjang, tambahkan jumlahnya
    //     if (isset($cart[$id])) {
    //         $cart[$id]['stok_produk'] += $request->input('stok_produk', 1);
    //     } else {
    //         $cart[$id] = $produk->toArray();
    //         $cart[$id]['stok_produk'] = $request->input('stok_produk', 1);
    //     }

    //     // Update cartCount in the session
    //     $cartCount = count($cart);
    //     Session::put('cartCount', $cartCount);
    //     // Menyimpan keranjang kembali ke sesi
    //     Session::put('cart', $cart);
    //     $newCartItem = $cart[$id];

    //     return response()->json(['newCartItem' => $newCartItem, 'cart' => $cart, 'cartCount' => $cartCount, 'message' => 'Product added to cart successfully'], 200);
    // }

    //  public function removeFromCartApi($id)
    // {
    //     // Mendapatkan keranjang dari sesi
    //     $cart = Session::get('cart', []);

    //     // Periksa apakah produk dengan ID tertentu ada di dalam keranjang
    //     if (isset($cart[$id])) {
    //         // Hapus produk dari keranjang
    //         unset($cart[$id]);

    //         // Update cartCount in the session
    //         $cartCount = count($cart);
    //         Session::put('cartCount', $cartCount);

    //         // Simpan keranjang kembali ke sesi
    //         Session::put('cart', $cart);

    //         return response()->json(['cart' => $cart, 'cartCount' => $cartCount, 'message' => 'Product removed from cart successfully'], 200);
    //     } else {
    //         // Produk tidak ditemukan di keranjang
    //         return response()->json(['message' => 'Product not found in cart'], 404);
    //     }
    // }


    // public function somePage()
    // {
    //     // Panggil fungsi showCartView() dan sertakan $cartItems ke dalam view
    //     return $this->showCartView();
    // }


    // public function showCart()
    // {
    //     // Retrieve the cart items from the session, or an empty array if not set
    //     $cart = Session::get('cart', []);
    //     // Retrieve the cart count from the session, or 0 if not set
    //     $cartCount = Session::get('cartCount', 0);
    //     // Pass both cart items and cart count to the view
    //     // return view('frontpage.landingpage', ['cartItems' => $cartItems, 'cartCount' => $cartCount]);
    //     return response()->json(['cart' => $cart, 'cartCount' => $cartCount]);
    // }

    // public function getCartCount()
    // {
    //     // Mendapatkan jumlah item di keranjang dari sesi
    //     $cartCount = Session::get('cartCount', 0);
    //     return response()->json(['cartCount' => $cartCount]);
    // }

    public function addToCart(Request $request)
    {
        $productId = $request->input('id_produk');
        // Lakukan validasi atau proses logika untuk menambahkan produk ke dalam session cart
        // Misalnya:
        $cart = session()->get('cart', []); // Dapatkan cart dari session atau buat baru jika belum ada
        $cart[] = $productId; // Tambahkan product_id ke dalam cart
        session()->put('cart', $cart); // Simpan kembali cart ke dalam session

        return response()->json(['message' => 'Product added to cart']);
    }


    public function getCartProducts()
    {
        $cart = session()->get('cart', []);

        // Lakukan proses konversi ID produk menjadi objek produk dari database
        $cartItems = [];
        foreach ($cart as $productId) {
            $product = Tb_produk::find($productId);
            if ($product) {
                $cartItems[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    // tambahkan informasi tambahan lainnya jika diperlukan
                ];
            }
        }

        // Kemudian, kembalikan data produk dalam format JSON
        return response()->json($cartItems);
    }

}
