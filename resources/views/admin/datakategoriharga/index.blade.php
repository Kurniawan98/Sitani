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
                      <h4 class="card-title">Data Kategori</h4>
                      </div>
                      <div class="col text-right">
                      {{-- <a href="{{ route('admin.datakategoriharga.tambah') }}" class="btn btn-primary">Tambah</a> --}}
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Import Harga Pangan
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
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Id Kategori</th>
                            <th>Nama Pangan</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th width="15%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $hargapangan)
                            <tr>
                                <td align="center"></td>
                                <td>{{ $hargapangan->id_category }}</td>
                                <td>{{ $hargapangan->namapangan }}</td>
                                <td>{{ $hargapangan->harga }}</td>
                                <td>{{ $hargapangan->tanggal }}</td>
                                <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('admin.datakategoriharga.edit',['id'=>$hargapangan->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="mdi mdi-tooltip-edit"></i>
                                  </a>
                                  <a href="{{ route('admin.datakategoriharga.delete',['id'=>$hargapangan->id]) }}" onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                    <i class="mdi mdi-delete-forever"></i>
                                  </a>
                                </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
