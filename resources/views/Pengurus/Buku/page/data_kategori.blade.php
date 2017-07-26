@extends('Pengurus.layout.layout-app')
@section('title') Data Kategori @endsection
@section('content')
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
					<a href="{{ url('/petugas/tambah-data-kategori') }}">
						<button class="btn btn-primary">
							Tambah Data Kategori
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/tambah-data-kategori') }}">
						<button class="btn btn-primary">
							Tambah Data Kategori
						</button>
					</a>
					@endif
				</div>
				<div class="box-body">
					<table id="buku" class="table table-hover table-bordered dt-responsive">
						<thead>
							<th>No.</th>
							<th>Nama Kategori</th>
							<th>Deskripsi</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($kategoris as $no => $kategori)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $kategori->nama_kategori }}</td>
								<td>{{ str_limit($kategori->deskripsi_kategori,20) }}</td>
								<td>
								@if (Auth::user()->level==1)
								<a href="{{ url('/petugas/detail-kategori',$kategori->id_kategori_buku) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
									<a href="{{ url('/petugas/edit-kategori',$kategori->id_kategori_buku) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/petugas/data-kategori',$kategori->id_kategori_buku) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?');">
											Hapus
										</button>
									</a>
								@elseif(Auth::user()->level==2)
								<a href="{{ url('/admin/detail-kategori',$kategori->id_kategori_buku) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
									<a href="{{ url('/admin/edit-kategori',$kategori->id_kategori_buku) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/admin/data-kategori',$kategori->id_kategori_buku) }}">
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