<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\HargaPanganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\hargapangan;
use Carbon\Carbon;

class HargaPanganController extends Controller
{
    public function index()
    {
        // $now = Carbon::now()->format('d/m/y');
         //Ambil data kategori dari database
            // $data = hargapangan::whereDate('tanggal', $now)->get();
            $data = hargapangan::all();
        // return response()->json($data);
        //menampilkan view
        return view('admin.datakategoriharga.index', compact('data'));
    }

    //function menampilkan view tambah data
    public function tambah()
    {
        return view('admin.datakategoriharga.tambah');
    }

    public function store(Request $request)
    {
        //Simpan datab ke database    
        HargaPangan::create([
            'name' => $request->name
        ]);
        
        //lalu reireact ke route admin.categories dengan mengirim flashdata(session) berhasil tambah data untuk manampilkan alert succes tambah data
        return redirect()->route('admin.datakategoriharga')->with('status','Berhasil Menambah Kategori');
    }

    public function update($id,Request $request)
    {
        //ambil data sesuai id dari parameter
        $hargapangan = hargapangan::FindOrFail($id);
        //lalu ambil apa aja yang mau diupdate
        $hargapangan->name = $request->name;

        //lalu simpan perubahan
        $hargapangan->save();
        return redirect()->route('admin.datakategoriharga')->with('status','Berhasil Mengubah Kategori');
    }

    //function menampilkan form edit
    public function edit($id)
    {
        $data = array(
            'hargapangan' => $hargapangan = hargapangan::FindOrFail($id)
        );
        return view('admin.datakategoriharga.edit',$data);
    }

    public function delete($id)
    {
        //hapus data sesuai id dari parameter
        hargapangan::destroy($id);
        
        return redirect()->route('admin.datakategoriharga')->with('status','Berhasil Mengahapus Kategori');
    
        //ambil data pelanggan yang di join dengan table alamat, city,dan province
        // $data = DB::table('users')
        //                 ->join('alamat','alamat.user_id','=','users.id')
        //                 ->join('cities','cities.city_id','=','alamat.cities_id')
        //                 ->join('provinces','provinces.province_id','=','cities.province_id')
        //                 ->select('users.*','alamat.detail','cities.title as kota','provinces.title as prov')
        //                 ->where('users.role','=','customer')->get();
        // return view('admin.hargapangan.index',compact('data'));
        // return response()->json($data);
    }

    
    public function import(Request $request)
    {
        
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('import_harga_pangan',$nama_file);
 
		// import data
		Excel::import(new HargaPanganImport, public_path('/import_harga_pangan/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Harga Pangan Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/admin/hargapangan');
        // return view('hargapangan.create');
    }
}
