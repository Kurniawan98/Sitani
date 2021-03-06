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
                      <h4 class="card-title">Edit berita</h4>
                      </div>
                      <div class="col text-right">
                      <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <form action="{{ route('admin.berita.update',['id' => $berita->id]) }}" method="POST" enctype='multipart/form-data'>
                              @csrf
                              <div class="form-group">
                              <label for="exampleInputUsername1">judul</label>
                              <input type="text" class="form-control" name="judul" value="{{ $berita->judul }}">
                              </div>
                              <div class="form-group">
                              <label for="exampleInputUsername1">tanggal</label>
                              <input type="date" class="form-control" name="tanggal" value="{{ $berita->tanggal }}">
                              </div>
                              <div class="form-group">
                              <label for="exampleInputUsername1">Gambar</label>
                              <input type="file" class="form-control" name="gambar" value="{{ $berita->gambar }}">
                              </div>
                              <div class="form-group">
                              <label for="exampleInputUsername1">isi</label>
                                  <textarea class="form-control" type="text" id="exampleFormControlTextarea1" rows="5" name="isi">
                                    {{ $berita->isi}}
                                  </textarea>
                              {{-- </div>
                              <h1>{{ $berita->judul }}</h1>
                              <small>{{ $berita->tanggal }}</small>
                              <td><img src="{{ asset('image_berita/'.$berita->gambar) }}" alt="" ></td>
                              <div>
                                {{ $berita->isi}} 
                              </div> --}}
                              <div class="text-right">
                                  <button type="submit" class="btn btn-success text-right">Ubah Berita</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
