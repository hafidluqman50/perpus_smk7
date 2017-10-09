@extends('Pengurus.layout.layout-app')
@section('title') Data Peminjaman @endsection
@section('content')
@if (session()->has('dlt_pnjm'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-danger">
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
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Nama Siswa</th>
							<th>NISN</th>
							<th>Judul Buku</th>
							<th>Tanggal Pinjam Buku</th>
							<th>Ket.</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($transaksi as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->nama_siswa }}</td>
								<td>{{ $data->nisn }}</td>
								<td>{{ $data->judul_buku }}</td>
								@if ($data->tanggal_pinjam_buku==NULL)
								<td>-</td>
								@else
								<td>{{ $data->tanggal_pinjam_buku }}</td>
								@endif
								@if ($data->status_pnjm=='0')
								<td><span class="label label-warning">Belum Dipinjamkan</span></td>
								@elseif ($data->status_pnjm==NULL)
								<td><span class="label label-danger">Batal Pinjam</span></td>
								@else
								<td><span class="label label-success">Dipinjamkan</span></td>
								@endif
								<td>
								@if (Auth::user()->level==1)
									<a href="{{ url('/petugas/detail-data-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-info">
											Info Pinjam
										</button>
									</a>
									@if($data->status_pnjm !='0')
									<a href="{{ url('/petugas/detail-data-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-info">
											Info Pinjam
										</button>
									</a>
									<button class="btn btn-success" disabled>
										Atur Transaksi
									</button>
									@else
									<button class="btn btn-info" disabled>
										Info Pinjam
									</button>
									<a href="{{ url('/petugas/atur-transaksi',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Atur Transaksi
										</button>
									</a>
									@endif
									<a href="{{ url('/petugas/perpanjang-pinjam',$data->id_transaksi) }}">
										<button class="btn btn-warning">
											Perpanjang
										</button>
									</a>
									<a href="{{ url('/delete/petugas/data-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-danger">
											Hapus
										</button>
									</a>
								@elseif(Auth::user()->level==2)
									@if($data->status_pnjm !='0')
									<a href="{{ url('/admin/detail-data-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-info">
											Info Pinjam
										</button>
									</a>
									<button class="btn btn-success" disabled>
										Atur Transaksi
									</button>
									@else
									<button class="btn btn-info" disabled>
										Info Pinjam
									</button>
									<a href="{{ url('/admin/atur-transaksi',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Atur Transaksi
										</button>
									</a>
									@endif
									<a href="{{ url('/admin/perpanjang-pinjam',$data->id_transaksi) }}">
										<button class="btn btn-warning">
											Perpanjang
										</button>
									</a>
									<a href="{{ url('/delete/admin/data-peminjaman',$data->id_transaksi) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">
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