<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = berita::all();
       
        return view('admin.berita.index' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tambah()
    {
        return view('admin.berita.tambah');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->file('gambar')){
            //simpan foto produk yang di upload ke direkteri public/storage/imageproduct
            $file = $request->file('gambar')->store('image_berita','public');

        Berita::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'image' => $file,
            'isi' => $request->isi
        ]);

        return redirect()->route('admin.berita')->with('status','Berhasil Menambah Berita');
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
        return view('admin.berita.detail', [
            'berita' => berita::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = array(
            'berita' => $berita = berita::FindOrFail($id)
        );
        return view('admin.berita.edit',$data);
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
        //
        //ambil data sesuai id dari parameter
        $berita = berita::FindOrFail($id);
        //lalu ambil apa aja yang mau diupdate
        $berita->judul = $request->input('judul');
        $berita->tanggal = $request->input('tanggal');
        $berita->image = $request->input('image');
        $berita->isi = $request->input('isi');

        //lalu simpan perubahan
        $berita->save();
        echo $berita;
        return redirect()->route('admin.berita')->with('status','Berhasil Mengubah Berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        berita::destroy($id);
        
        return redirect()->route('admin.berita')->with('status','Berhasil Mengahapus Berita');
    }
}
