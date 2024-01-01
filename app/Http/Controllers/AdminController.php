<?php

namespace App\Http\Controllers;

use App\Models\Tb_kategori;
use App\Models\Tb_produk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk=new Tb_produk(); 
        if(isset($_GET['s'])){ 
            $s=$_GET['s']; 
            $produk=$produk->where('nama_produk', 'like', "%$s%"); 
        } 

        if(isset($_GET['id_kategori'])&&$_GET['id_kategori']!=''){ 
            $produk=$produk->where('id_kategori', $_GET['id_kategori']); 
        } 
           
        $produk=$produk->paginate(5);
        $kategori=Tb_kategori::all();

        $kategoriMakananId = 1; 
        $kategoriMinumanId = 2;
        $totalProdukMakanan = Tb_produk::whereHas('kategori', function($query) use ($kategoriMakananId) {
            $query->where('id_kategori', $kategoriMakananId);
        })->count();
        $totalProdukMinuman = Tb_produk::whereHas('kategori', function($query) use ($kategoriMinumanId) {
            $query->where('id_kategori', $kategoriMinumanId);
        })->count();

        $totalAdmin = User::where('role', 'admin')->count();
        $totalPengguna = User::where('role', 'user')->count();
        
        return view('backpage.dashboard',compact('produk','kategori','totalProdukMakanan','totalProdukMinuman','totalAdmin','totalPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Tambah Data"; 
        $kategori=Tb_kategori::all();
        return view('backpage.input',compact('title','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [ 
            'required'=> 'Kolom :attribute harus lengkap', 
            'numeric' => 'Kolom :attribute Harus Angka.', 
            'file'=>'Perhatikan format dan ukuran file'
        ]; 
    
        $validasi=$request->validate([ 
            'nama_produk'=>'required', 
            'desk_produk'=>'', 
            'harga_produk'=>'numeric', 
            'stok_produk'=>'numeric', 
            'id_kategori'=>'required',
            'gambar_produk' => 'required','mimes:png,jpg'
        ], $messages); 
            
        try { 
            $fileName = time().$request->file('gambar_produk')->getClientOriginalName(); 
            $path = $request->file('gambar_produk')->storeAs('gambarproduk',$fileName); 
            $validasi['gambar_produk']=$path; 
            $response = Tb_produk::create($validasi); 
            session()->flash('success', 'Produk berhasil ditambahkan!');
            return redirect('admin'); 
        }

        catch (\Exception $e) { 
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
            // echo $e->getMessage(); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title="Edit Data"; 
        $kategori=Tb_kategori::all(); 
        $produk=Tb_produk::find($id); 
        if($produk != NULL){ 
            return view('backpage.input',compact('title','kategori','produk')); 
        }else{ 
            return view('backpage.input',compact('title','kategori')); 
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi=$request->validate([ 
            'nama_produk'=>'required', 
            'desk_produk'=>'', 
            'harga_produk'=>'numeric', 
            'stok_produk'=>'numeric', 
            'id_kategori'=>'required',
            'gambar_produk' => ''
        ]); 
            
        try {
            if($request->file('gambar_produk')){
                $fileName = time().$request->file('gambar_produk')->getClientOriginalName(); 
                $path = $request->file('gambar_produk')->storeAs('gambarproduk',$fileName); 
                $validasi['gambar_produk']=$path; 
            }
            $response = Tb_produk::find($id)->update($validasi);
            session()->flash('success', 'Produk berhasil diperbarui!');
            return redirect('admin');
            
        }
        catch (\Exception $e) { 
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
            // echo $e->getMessage(); 
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $produk = Tb_produk::find($id); 
            $produk->delete(); 
    
            session()->flash('success', 'Produk berhasil dihapus!'); 
            return redirect('admin');
        } 
        catch (\Exception $e) { 
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        } 
    }

    public function kategoriku($id){
        $kategori=Tb_kategori::where('id_kategori',$id)->first(); 
        $produk=$kategori->produk; 
        $kategori=Tb_kategori::all(); 
        return view('backpage.dashboard',compact('produk','kategori')); 
    }


}
