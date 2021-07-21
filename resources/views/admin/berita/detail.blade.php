@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Kategori </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Detail berita</h4>
                      </div>
                      <div class="col text-right">
                      <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        
                          <form action="{{ route('admin.berita.detail',['id' => $berita->id]) }}">
                            {{-- @foreach ($berita as $d) --}}
                              @csrf
                              
                              <h1>{{ $berita->judul }}</h1>
                              <small>{{ $berita->tanggal }}</small>
                              <td><img src="{{ asset('image_berita/'.$berita->gambar) }}" alt="" ></td>
                              <div>
                                {{ $berita->isi}} 
                              </div>
                              <div class="text-right">
                                <a href="{{ route('admin.berita.edit',['id'=>$berita->id]) }}" class="btn btn-warning">Edit Berita</a>
                              </div>
                              {{-- @endforeach --}}
                          </form>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
