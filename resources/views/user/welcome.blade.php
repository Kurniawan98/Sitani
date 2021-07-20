@extends('user.app')
@section('content')
<div class="site-blocks-cover" style="background-image: url({{ asset('shopper') }}/images/bawang.JPG);" data-aos="fade">
    <div class="container">
    <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
        <h1 class="mb-2">Berbagai Harga Pangan Pertanian</h1>
        <div class="intro-text text-center text-md-left">
            <p class="mb-4">Sumber: SIHATI,PIHPS,HargaJateng</p>
            <p>
            <a href="{{ route('user.produk') }}" class="btn btn-sm btn-primary">BELI TEBASAN DISINI!!</a>
            </p>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light"  data-aos="fade-up">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Harga Pangan</h2>
        </div>
                    </div>
                        <div class="body">
                            <div class="table-responsive">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0">
                                            </label>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156.875px;">Kategori</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 256.469px;">Nama Pangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 102.359px;">Harga</th>        
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 102.359px;">Tanggal</th>        
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $d)
                                        <tr role="row" class="odd">
                                            <td>{{ $d->id_category }}</td>
                                            <td>{{ $d->namapangan }}</td>
                                            <td>{{ $d->harga }}</td>
                                            <td>{{ $d->tanggal }}</td>
                                        </tr>
                                            
                                        @empty
                                            
                                        @endforelse
					                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="row">
                <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing entries</div>
                </div><div class="col-sm-12 col-md-7">
				<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
				<ul class="pagination">	
					<li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
						<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
					<li class="paginate_button page-item active">
						<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
					<li class="paginate_button page-item next" id="DataTables_Table_0_next">
						<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
					</ul>
					</div>
				</div>
				</div>
				</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
    @endsection