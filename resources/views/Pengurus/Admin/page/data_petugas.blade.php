@extends('Pengurus.layout.layout-app')
@section('title') Data Petugas @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Data Petugas
					</p>
					<br/>
					<br/>
					@if (Auth::user()->level==1)
					<a href="{{ url('/petugas/tambah-data-petugas') }}">
						<button class="btn btn-primary">
							Tambah Data Buku
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/tambah-data-petugas') }}">
						<button class="btn btn-primary">
							Tambah Data Buku
						</button>
					</a>
					@endif
				</div>
				<div class="box-body">
					<table id="buku" class="table table-hover table-bordered dt-responsive">
						<thead>
							<th>No.</th>
							<th>Nama Petugas</th>
							<th>NIP</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</thead>
						<tbody>
						{{-- @foreach ($bukus as $no => $buku)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $buku->judul_buku }}</td>
								<td>{{ $buku->kategori->nama_kategori }}</td>
								<td>{{ $buku->penerbit }}</td>
								<td>{{ $buku->tahun_terbit }}</td>
								<td>@if ($buku->stok_buku==0)
								<small class="label bg-red">
								{{ $buku->stok_buku }}
								</small>
								@else
								<small class="label bg-green">
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
						@endforeach --}}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection