@extends('Pengurus.layout.layout-app')
@section('title') Data Buku @endsection
@section('content')
@if (session()->has('tmbh_buku'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success">
				{{ session('tmbh_buku') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@elseif(session()->has('imprt'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success">
				{{ session('imprt') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@elseif(session()->has('edt_buku'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-warning">
				{{ session('edt_buku') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@elseif(session()->has('dlt_buku'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-danger">
				{{ session('dlt_buku') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@endif	
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Data Buku
					</p>
					<br/>
					<br/>
					@if (Auth::user()->level==1)
					<a href="{{ url('/petugas/tambah-data-buku') }}">
						<button class="btn btn-primary">
							Tambah Data Buku
						</button>
					</a>
					<a href="{{ url('/petugas/import-buku') }}">
						<button class="btn btn-success">
							Import Data Buku
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/tambah-data-buku') }}">
						<button class="btn btn-primary">
							Tambah Data Buku
						</button>
					</a>
					<a href="{{ url('/admin/import-buku') }}">
						<button class="btn btn-success">
							Import Data Buku
						</button>
					</a>
					@endif
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Judul Buku</th>
							<th>Kategori</th>
							<th>Penerbit</th>
							<th>Tahun Terbit</th>
							<th>Jumlah Eksemplar</th>
							<th>Stok Buku</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($bukus as $no => $buku)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $buku->judul_buku }}</td>
								<td>{{ $buku->kategori->nama_kategori }}</td>
								<td>{{ $buku->penerbit }}</td>
								<td>{{ $buku->tahun_terbit }}</td>
								<td>{{ $buku->jumlah_eksemplar }}</td>
								<td>@if ($buku->stok_buku == 0)
								<small class="label label-danger">
								0
								</small>
								@else
								<small class="label label-success">
								{{ $buku->stok_buku }}
								</small>
								@endif</td>
								<td>
								@if (Auth::user()->level==1)
								<a href="{{ url('/petugas/detail-buku',$buku->id_buku) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
									<a href="{{ url('/petugas/edit-buku',$buku->id_buku) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/petugas/data-buku',$buku->id_buku) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?');">
											Hapus
										</button>
									</a>
								@elseif(Auth::user()->level==2)
								<a href="{{ url('/admin/detail-buku',$buku->id_buku) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
									<a href="{{ url('/admin/edit-buku',$buku->id_buku) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/admin/data-buku',$buku->id_buku) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?');">
											Hapus
										</button>
									</a>
								@endif
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection