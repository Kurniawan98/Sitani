@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Berita </h3>
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/admin/hargapangan/upload_harga_pangan" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        
                                        {{-- <div class="input-group col-xs-12">
                                            <input type="file" name="file" class="form-control file-upload-info" disabled="" placeholder="Upload File">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                            </span>
                                        </div> --}}

                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Data Harga Pangan</h4>
                      <!-- Button trigger modal -->
                    
                      </div>
                    </div>
                    <div class="body table-responsive">
                            <table class="table table-bordered table hovered" id="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PANGAN</th>
                                        <th>HARGA</th>
                                        <th>TANGGAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $hrg)
                                    <tr>
                                        <td align="center"></td>
                                        <td>{{ $hrg->name }}</td>
                                        <td>{{ $hrg->harga }}</td>
                                        <td>{{ $hrg->tanggal }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Tidak ada</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    {{-- <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Nama Pangan</th>
                            <th>Harga</th>
                            <th>tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($pelanggan as $pel)
                            <tr>
                                <td align="center"></td>
                                <td>{{ $pel->name }}</td>
                                <td>{{ $pel->email }}</td>
                                <td>{{ $pel->detail }}, {{ $pel->kota }}, {{ $pel->prov }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
