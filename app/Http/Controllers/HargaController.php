<?php

namespace App\Http\Controllers;

use App\Models\Tb_harga_produk;
use App\Models\Tb_produk;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    // Fungsi untuk menampilkan daftar harga produk
    public function index()
    {
        $harga = Tb_harga_produk::all();
        $produk = Tb_produk::all();
        return view('backpage.menuharga', compact('harga', 'produk'));
    }

    // Fungsi untuk menampilkan form tambah data harga produk
    public function create()
    {
        $title = "Tambah Data";
        $produk = Tb_produk::all();
        return view('backpage.inputharga', compact('title', 'produk'));
    }

    // Fungsi untuk menyimpan data harga produk yang baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_harga' => 'required',
            'end_harga' => 'required',
            'harga_produk' => 'required',
            'id_produk' => 'required',
        ]);

        Tb_harga_produk::create($validatedData);
        session()->flash('success', 'Harga berhasil ditambahkan!');
        return redirect()->route('harga-produk.index');
    }

    // Fungsi untuk menampilkan data harga produk tertentu
    public function show($id)
    {
        // Implementasi sesuai kebutuhan
    }

    // Fungsi untuk menampilkan form edit data harga produk
    public function edit($id)
    {
        $title = "Edit Data";
        $harga = Tb_harga_produk::findOrFail($id);
        $produk = Tb_produk::all();
        return view('backpage.inputharga', compact('harga', 'produk', 'title'));
    }

    // Fungsi untuk menyimpan perubahan pada data harga produk
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_harga' => 'required',
            'end_harga' => 'required',
            'harga_produk' => 'required',
            'id_produk' => 'required',
        ]);

        Tb_harga_produk::whereId($id)->update($validatedData);
        session()->flash('success', 'Harga berhasil diperbarui!');
        return redirect()->route('harga-produk.index');
    }

    public function destroy($id)
    {
        $harga = Tb_harga_produk::find($id);
        $harga->delete(); 
        session()->flash('success', 'Harga berhasil dihapus!'); 
        return redirect()->route('harga-produk.index');
        
    }
}
