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
							Tambah Data Petugas
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/tambah-data-petugas') }}">
						<button class="btn btn-primary">
							Tambah Data Petugas
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
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($data_petugas as $no => $petugas)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $petugas->nama_petugas }}</td>
								<td>{{ $petugas->nip }}</td>
								<td>
									<a href="{{ url('/admin/detail-petugas') }}">
										<button class="btn btn-info">
											Detail Petugas
										</button>
									</a>
									<a href="{{ url('/admin/delete-petugas') }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');">
											Hapus Petugas
										</button>
									</a>
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