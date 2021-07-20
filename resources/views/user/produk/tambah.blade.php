@extends('user.app')
@section('content')
<div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Tambah</h4>
                      </div>
                      <div class="col text-right">
                      <a href="/produk" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{Route('user.produk.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                                
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputUsername1">Nama</label>
                                    <input type="text" class="form-control" name="name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                    <textarea class="form-control" type="text" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputUsername1">Harga</label>
                                    <input type="number" class="form-control" name="price">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputUsername1">Gambar</label>
                                    <input type="file" class="form-control" name="file">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="name" class="col-md-4 col-form-label">Pilih Produk</label>
                                      <select  class="form-control" name="category" id="category" onchange="onChange()">
                                          <option value="">== Pilih Produk ==</option>
                                          @foreach ($category as $c)
                                          <option value="{{$c->id}}">{{$c->name}}</option>
                                              
                                          @endforeach
                                      </select>
                                  </div>
                                </div>
                                

                                {{-- Produk Tebas --}}
                                <div class="row" style="display:none;" id="product-tebas">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Luas Lahan</label>
                                      <input type="text" class="form-control" name="">
                                    </div>
                                  </div>
                                </div>
                                {{-- Produk Tebas --}}


                                {{-- Produk Bisaa--}}
                                <div class="row" style="display:none;" id="product-biasa">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Stok</label>
                                      <input type="text" class="form-control" name="stok">
                                    </div>
                                  </div>
                                </div>
                                {{-- Produk Biasa--}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success text-right">Upload</button>
                                </div>
                              </form>
                             </div> 
                        </div>
                    </div>
                  </div>
                </div>

<script>
  function onChange(){
    let selectEl=document.getElementById('category');

    let valueSelect=selectEl.value;
    if(valueSelect === '1'){
      document.getElementById('product-biasa').style.display ='block'
      document.getElementById('product-tebas').style.display ='none'
    }else{
      document.getElementById('product-biasa').style.display ='none'
      document.getElementById('product-tebas').style.display ='block'

    }
  }
</script>
@endsection

