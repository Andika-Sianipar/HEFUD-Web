<?php

// use App\Http\Controllers\API\AuthController;
// use App\Http\Controllers\API\ApiHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'indexhome'])->name('home');
Route::get('/contact', [HomeController::class, 'indexcontact'])->name('contact');
Route::get('/about', [HomeController::class, 'indexabout'])->name('about');
Route::get('/produk-makanan', [HomeController::class, 'allmakanan'])->name('allmakanan');
Route::get('/produk-minuman', [HomeController::class, 'allminuman'])->name('allminuman');

Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('admin', AdminController::class)->names([
            'index' => 'admin.index'
        ]);
        Route::resource('harga-produk', HargaController::class)->names([
            'index' => 'harga-produk.index'
        ]);
    });
    
    Route::get('/produk/{id}', [HomeController::class, 'showdetail'])->name('produk');
});

Route::middleware('apikey')->group(function () {
    // API
    Route::post('/api/login', 'API\AuthController@login')->name('api.login');
    Route::post('/api/register', 'API\AuthController@register')->name('api.register');
});

// Route::get('/api/produk', 'API\ApiHomeController@indexhome')->name('api.home');

// Route::post('/api/addtocart/{id}', 'API\ApiHomeController@addToCartAPI');
// Route::get('/api/getCartCount', 'API\ApiHomeController@getCartCount');
// Route::get('api/cart', 'API\ApiHomeController@showCart');
// Route::delete('/api/removefromcart/{productId}', 'API\ApiHomeController@removeFromCartApi');
// Route::get('/some-page', 'API\ApiHomeController@somePage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
