@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Data Pengembalian @endsection
@section('content')
@if (session()->has('success'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success">
				{{ session('success') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@elseif(session()->has('log'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-danger">
				{{ session('log') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
						Data Pengembalian
					</p>
					<br>
					<br>
					@if (Auth::user()->level==1)
						@if($count > 0)				
							<a href="{{ url('/petugas/kembali-buku') }}">
							<button class="btn btn-primary">
								Kembalikan Buku
							</button>
							</a>
						@else
							<button class="btn btn-primary" disabled>
								Kembalikan Buku
							</button>
						@endif
					@elseif(Auth::user()->level==2)
						@if($count > 0)				
							<a href="{{ url('/admin/kembali-buku') }}">
							<button class="btn btn-primary">
								Kembalikan Buku
							</button>
							</a>
						@else
							<button class="btn btn-primary" disabled>
								Kembalikan Buku
							</button>
						@endif
					@endif
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Nama Siswa</th>
							<th>NISN</th>
							<th>Judul Buku</th>
							<th>Tanggal Kembali Buku</th>
							<th>Denda</th>
							<th>Keterangan</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($transaksi as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->nama_siswa }}</td>
								<td>{{ $data->nisn }}</td>
								<td>{{ $data->judul_buku }}</td>
							@if ($data->tanggal_kembali==null)
								<td>-</td>
							@else
								<td>{{ $data->tanggal_kembali }}</td>
							@endif
							@if($data->denda==null)
								<td>-</td>
							@else
								<td>{{ $data->denda }}</td>
							@endif
							@if ($data->status_kmbli=='0')
								<td><span class="label label-danger">Belum Kembali</span></td>
							@elseif($data->status_kmbli=='1')
								<td><span class="label label-success">Sudah Kembali</span></td>
							@else
								<td>-</td>
							@endif
								<td>
								@if (Auth::user()->level==1)
									@if($data->status_kmbli=='1')
										<a href="{{ url('/petugas/detail-kembali-buku',$data->id_transaksi) }}">
											<button class="btn btn-info">
												Info Kembali
											</button>
										</a>
									@else
									<button class="btn btn-info" disabled>
										Info Kembali
									</button>
									@endif
								@elseif(Auth::user()->level==2)
									@if($data->status_kmbli=='1')
										<a href="{{ url('/admin/detail-kembali-buku',$data->id_transaksi) }}">
											<button class="btn btn-info">
												Info Kembali
											</button>
										</a>
									@else
									<button class="btn btn-info" disabled>
										Info Kembali
									</button>
									@endif
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