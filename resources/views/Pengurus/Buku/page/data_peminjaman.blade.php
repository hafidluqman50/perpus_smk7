@extends('Pengurus.layout.layout-app')
@section('title') Data Buku @endsection
@section('content')
@if (session()->has('dlt_pnjm'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success">
				{{ session('dlt_pnjm') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
						Data Peminjaman
					</p>
					<br>
					<br>
					@if (Auth::user()->level==1)
					<a href="{{ url('/petugas/tambah-data-peminjaman') }}">
						<button class="btn btn-primary">
							Tambah Data Peminjaman
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/tambah-data-peminjaman') }}">
						<button class="btn btn-primary">
							Tambah Data Peminjaman
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
							<th>Ket.</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($transaksi as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->judul_buku }}</td>
								<td>{{ $data->nisn }}</td>
								<td>{{ $data->nama_siswa }}</td>
								@if ($data->tanggal_pinjam_buku==null)
								<td>-</td>
								@else
								<td>{{ $data->tanggal_pinjam_buku }}</td>
								@endif
								@if ($data->tanggal_jatuh_tempo==null)
								<td>-</td>
								@else
								<td>{{ $data->tanggal_jatuh_tempo }}</td>
								@endif
								@if ($data->status_pnjm==0)
								<td><span class="label label-danger">Belum Dipinjamkan</span></td>
								@else
								<td><span class="label label-success">Dipinjamkan</span></td>
								@endif
								<td>
								@if (Auth::user()->level==1)
									<a href="{{ url('/petugas/atur-transaksi',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Atur Transaksi
										</button>
									</a>
								@elseif(Auth::user()->level==2)
									<a href="{{ url('/admin/atur-transaksi',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Atur Transaksi
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