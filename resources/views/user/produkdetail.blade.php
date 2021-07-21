@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detail</strong></div>
    </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset('product_image/'.$produk->image) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
        <h2 class="text-black">{{ $produk->name }}</h2>
        <p>
            {{ $produk->description }}
        </p>
        <p><strong class="text-primary h4">Rp {{ $produk->price }} </strong></p>
        <div class="mb-5">
            <form action="{{ route('user.keranjang.simpan') }}" method="post">
                @csrf
                @if(Route::has('login'))
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                @endif
            <input type="hidden" name="products_id" value="{{ $produk->id }}">
            <small>Sisa Stok {{ $produk->stok }}</small>
            <input type="hidden" value="{{ $produk->stok }}" id="sisastok">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
        </div>
        <div class="">
            <a href="#" class="btn btn-primary">Hubungi Penjuan</a></br></br>
        </div>
        @if(Auth::user() == null)
        @elseif(Auth::user()['role'] == 'petani')
        <div class="">
            <a href="{{ route('user.produk.edit',['id'=>$produk->id]) }}" class="btn btn-warning">Edit Produk</a></br></br>
            <a href="{{ route('user.produk.delete',['id'=>$produk->id]) }}" onclick="return confirm('Yakin Hapus data')" class="btn btn-danger">Hapus Produk</a></br></br>
        </div>

        @endif
        {{-- <p><button type="submit" class="buy-now btn btn-sm btn-primary">Hubungi penjual</button></p> --}}
        </form>
        </div>
    </div>
    </div>
</div>
@endsection