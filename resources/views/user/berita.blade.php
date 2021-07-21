@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Produk</strong></div>
    </div>
    
    </div>
</div>
    

<div class="site-section">
    <div class="container">
    <div class="row mb-5">
        <div class="col-md-9 order-2">
        <div class="row mb-5">
            {{-- @foreach($produks as $produk) --}}
            <div data-aos="fade-up">
            @foreach($data as $c)
            <form action="{{ route('berita',['id' => $c->id]) }}">
            <h1>{{ $c->judul }}</h1>
            <small>{{ $c->tanggal }}</small>
            {{-- <td><img src="{{ asset('image_berita/'.$berita->gambar) }}" alt="" ></td> --}}
            <p>
                {{ $c->isi}} 
            </p>
            </form>
            @endforeach
            </div>
            

        </div>
        {{-- <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-right">
            <div class="site-block-27">
            {{ $data->links() }}
            </div>
            </div>
        </div> --}}
        </div>
        <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Daftar Berita</h3>
            <ul class="list-unstyled mb-0">
                @foreach($data as $c)
                <li class="mb-1"><a href="{{ route('berita',['id' => $c->id]) }}" class="d-flex"><span>{{ $c->judul }}</span> <span class="text-black ml-auto"></span></a></li>
                @endforeach
            </ul>
        </div>
         
        </div>
    </div>
    
    </div>

@endsection