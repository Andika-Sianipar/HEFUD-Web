<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ApiHomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//AUTH
// Route::get('/user', [AuthController::class, 'getLoggedInUser'])->name('user.info');

//LOGIN & REGISTER
// Route::post('/login', [AuthController::class,'login'])->name('api.login');
// Route::post('/register', [AuthController::class,'register'])->name('api.register');

//HARGA
Route::get('/produk/{id}/harga',  [ApiHomeController::class,'getHargaProduk']);

//CART
Route::post('/cart/add', [ApiHomeController::class,'addToCart'])->name('cart.add');
Route::get('/cart', [ApiHomeController::class,'getCartProducts'])->name('cart.products'); 

//HOME
Route::get('/produk', [ApiHomeController::class,'indexhome'])->name('api.home');
Route::get('/produk/{id}', [ApiHomeController::class,'indexdetail'])->name('api.detail');