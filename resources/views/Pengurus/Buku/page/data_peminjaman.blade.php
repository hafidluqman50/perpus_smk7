@extends('Pengurus.layout.layout-app')
@section('title') Data Buku @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Data Peminjaman
					</p>
					<br/>
					<br/>
					@if (Auth::user()->level==1)
					<a href="{{ url('/petugas/pinjam-buku') }}">
						<button class="btn btn-primary">
							Pinjam Buku
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/pinjam-buku') }}">
						<button class="btn btn-primary">
							Pinjam Buku
						</button>
					</a>
					@endif
				</div>
				<div class="box-body">
					<table id="buku" class="table table-hover table-bordered dt-responsive">
						<thead>
							<th>No.</th>
							<th>Judul Buku</th>
							<th>NISN</th>
							<th>Nama Siswa</th>
							<th>Tanggal Pinjam Buku</th>
							<th>Tanggal Harus Kembalikan</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($transaksi as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->judul_buku }}</td>
								<td>{{ $data->nisn }}</td>
								<td>{{ $data->nama_siswa }}</td>
								<td>{{ $data->tanggal_pinjam_buku }}</td>
								<td>{{ $data->tanggal_jatuh_tempo }}</td>
								<td>
								@if (Auth::user()->level==1)
									<a href="{{ url('/petugas/detail-buku',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
									<a href="{{ url('/petugas/edit-buku',$data->id_transaksi) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/petugas/data-buku',$data->id_transaksi) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?');">
											Hapus
										</button>
									</a>
								@elseif(Auth::user()->level==2)
									<a href="{{ url('/admin/detail-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
									<a href="{{ url('/admin/edit-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/admin/data-peminjaman',$data->id_transaksi) }}">
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