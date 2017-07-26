@extends('Pengurus.layout.layout-app')
@section('title') Data Buku @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Data Pengembalian
					</p>
				</div>
				<div class="box-body">
					<table id="buku" class="table table-hover table-bordered dt-responsive">
						<thead>
							<th>No.</th>
							<th>Judul Buku</th>
							<th>Nama Siswa</th>
							<th>Tanggal Kembalikan Buku</th>
							<th>Denda</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($transaksi as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->judul_buku }}</td>
								<td>{{ $data->nama_siswa }}</td>
							@if ($data->tanggal_kembalikan_buku==null)
								<td>-</td>
							@else
								<td>{{ $data->tanggal_kembalikan_buku }}</td>
							@endif
							@if($data->denda==null)
								<td>-</td>
							@else
								<td>{{ $data->denda }}</td>
							@endif
							@if ($data->status==1)
								<td>Belum Kembali</td>
							@elseif($data->status==2)
								<td>Sudah Kembali</td>
							@else
								<td>-</td>
							@endif
								<td>
								@if (Auth::user()->level==1)
									<a href="{{ url('/petugas/kembali-buku',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Kembalikan
										</button>
									</a>
									<a href="{{ url('/petugas/detail-kembali',$data->id_transaksi) }}">
										<button class="btn btn-warning">
											Detail Kembali
										</button>
									</a>
								@elseif(Auth::user()->level==2)
									<a href="{{ url('/admin/kembali-buku',$data->id_transaksi) }}">
										<button class="btn btn-success">
											Kembalikan
										</button>
									</a>
									<a href="{{ url('/admin/detail-kembali',$data->id_transaksi) }}">
										<button class="btn btn-warning">
											Detail Kembali
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