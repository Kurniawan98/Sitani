<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ProdukController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        //menampilkan data produk yang dijoin dengan table kategori
        //kemudian dikasih paginasi 9 data per halaman nya
        // $kat = DB::table('categories')
        //         ->join('products','products.categories_id','=','categories.id')
        //         ->select(DB::raw('count(products.categories_id) as jumlah, categories.*'))
        //         ->groupBy('categories.id')
        //         ->get();

        if (Auth::user() == null) {
            $category = DB::table('categories')->get();
            $data = array(
                'produks' => Product::paginate(9),
                'categories' => $category
            );
        }else {
            $category = DB::table('categories')->get();
            $data = array(
                'produks' => Product::where('id_users', Auth::user()['id'])->paginate(9),
                'categories' => $category
            );
            
        }
        return view('user.produk',$data);
        // return response()->json($data);
    }
    public function detail($id)
    {
        //mengambil detail produk
        $data = array(
            'produk' => Product::findOrFail($id)
        );
        return view('user.produkdetail',$data);
    }

    public function cari(Request $request)
    {
        //mencari produk yang dicari user
        $prod  = Product::where('name','like','%' . $request->cari. '%')->paginate(9);
        $total = Product::where('name','like','%' . $request->cari. '%')->count(); 
        $data  = array(
            'produks' => $prod,
            'cari' => $request->cari,
            'total' => $total
        );
        return view('user.cariproduk',$data);

    }

    public function form()
    {
        $category = Categories::all();
        return view('user.produk.tambah', compact('category'));
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $id_user = Auth::user()['id'];
        //Simpan datab ke database    
        Product::create([
            'name' => $request->name,
            'id_users' => $id_user,
            'description' => $request->description,
            'image' => $file->getClientOriginalName(),
            'price' => $request->price,
            'categories_id' => $request->category,
        ]);
        
        $file->move('product_image',$file->getClientOriginalName());

        return redirect('produk');
    }

    public function edit($id)
    {
        //
        $produk = array(
            'produk' => $produk = Product::FindOrFail($id),
            // 'category' => $berita = Category::FindOrFail($name)
            'category' => Categories::all()
        );
        return view('user.produk.edit',$produk);
    }

    public function update(Request $request, $id)
    {
        //
        //ambil data sesuai id dari parameter
        $produk = Product::FindOrFail($id);
        //lalu ambil apa aja yang mau diupdate
        $produk->name = $request->input('name');
        $produk->description = $request->input('description');
        $produk->price = $request->input('price');
        $produk->image = $request->input('image');
        $produk->categories_id = $request->input('category');

        //lalu simpan perubahan
        $produk->save();
        return redirect('produk');
        // return redirect()->route('produk')->with('status','Berhasil Mengubah Produk');
    }

    public function destroy($id)
    {
        //
        Product::destroy($id);
        
        return redirect()->route('user.produk')->with('status','Berhasil Mengahapus Produk');
    }
}
