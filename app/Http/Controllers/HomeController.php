<?php

namespace App\Http\Controllers;

use App\Models\Tb_produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function indexhome(){
        if (Auth::check()) {
            $role = Auth::user()->role;
            
            if ($role == 'user') {
                return view('frontpage.landinghome');
            } else if ($role == 'admin') {
                return view('frontpage.landinghome'); // Atau alihkan ke halaman lain untuk admin jika perlu
            }
        }
    
        // Jika pengguna tidak terautentikasi atau tidak memiliki peran, 
        // Anda dapat memutuskan logika default yang ingin ditampilkan
        return view('frontpage.landinghome');
    }
    

    function indexcontact(){
        return view('frontpage.landingcontact',['title'=>"contact"]);
    }

    function indexabout(){
        return view('frontpage.landingabout',['title'=>"about"]);
    }

    function allmakanan(){
        // $produk = Tb_produk::all();
        // return view('frontpage.landingallmakanan', compact('produk'));
        return view('frontpage.landingallmakanan');
    }

    function allminuman(){
        // $produk = Tb_produk::all();
        // return view('frontpage.landingallminuman', compact('produk'));
        return view('frontpage.landingallminuman');
    }

   function showdetail($id){
        // $produk = Tb_produk::find($id);
        // return view('frontpage.landingproduk',['item'=>$produk]);
        return view('frontpage.landingproduk');
    }
}
