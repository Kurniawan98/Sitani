<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\HargaPanganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\kategoriharga;


class KategoriHargaPanganController extends Controller

{
    public function index()
    {

        //Ambil data kategori dari database
            $data = kategoriharga::all();
        //menampilkan view
        return view('admin.kategoriharga.index', compact('data'));
    }

    //function menampilkan view tambah data
    public function tambah()
    {
        return view('admin.kategoriharga.tambah');
    }

    public function store(Request $request)
    {
        //Simpan datab ke database    
        kategoriharga::create([
            'category' => $request->categorys,
            'name_categorys' => $request->name_categorys
        ]);
        
        //lalu reireact ke route admin.categories dengan mengirim flashdata(session) berhasil tambah data untuk manampilkan alert succes tambah data
        return redirect()->route('admin.kategoriharga')->with('status','Berhasil Menambah Kategori');
    }

    public function update($id,Request $request)
    {
        //ambil data sesuai id dari parameter
        $categorie_harga_pangan = kategoriharga::FindOrFail($id);
        //lalu ambil apa aja yang mau diupdate
        $categorie_harga_pangan->name = $request->name;

        //lalu simpan perubahan
        $categorie_harga_pangan->save();
        return redirect()->route('admin.kategoriharga')->with('status','Berhasil Mengubah Kategori');
    }

    //function menampilkan form edit
    public function edit($id)
    {
        $data = array(
            'categorie_harga_pangan' => $categories_harga_pangan = kategoriharga::FindOrFail($id)
        );
        return view('admin.kategoriharga.edit',$data);
    }

    public function delete($id)
    {
        //hapus data sesuai id dari parameter
        kategoriharga::destroy($id);
        
        return redirect()->route('admin.kategoriharga')->with('status','Berhasil Mengahapus Kategori');
    }
}


