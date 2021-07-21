<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\hargapangan;
use Illuminate\Support\Facades\DB;
use App\Berita;
class WelcomeController extends Controller
{
    public function index()
    {
        //menampilkan data produk dihalamam utama user dengan limit 10 data
        //untuk di carousel
        // $data = array(
        //     'produks' => DB::table('products')->limit(10)->get(),
        // );
        $data = hargapangan::all();
        return view('user.welcome',compact('data'));
    }

    public function berita()
    {
        $data = berita::all();

        return view('user.berita',compact('data'));
    }

    // public function berita_detail($id)
    // {
    //     return view('user.berita', [
    //         'berita' => berita::findOrFail($id)
    //     ]);
    // }
}
