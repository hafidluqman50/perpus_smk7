@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Data Transaksi @endsection
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
						Data Transaksi
					</p>
					<br>
					<br>
					@if (Auth::user()->level==1)
					<a href="{{ url('/petugas/pinjam-buku') }}">
						<button class="btn btn-primary">
							<i class="fa fa-book"></i> Pinjam Buku
						</button>
					</a>
					<a href="{{ url('/petugas/kembali-buku') }}">
						<button class="btn btn-info">
							<i class="fa fa-bookmark"></i> Kembalikan Buku
						</button>
					</a>{{-- 
					<a href="{{ url('/report/petugas/transaksi') }}">
						<button class="btn btn-success">
							<i class="fa fa-print"></i> Cetak Report Transaksi
						</button>
					</a> --}}
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/pinjam-buku') }}">
						<button class="btn btn-primary">
							<i class="fa fa-book"></i> Pinjam Buku
						</button>
					</a>
					<a href="{{ url('/admin/kembali-buku') }}">
						<button class="btn btn-info">
							<i class="fa fa-bookmark"></i> Kembalikan Buku
						</button>
					</a>{{-- 
					<a href="{{ url('/report/admin/transaksi') }}">
						<button class="btn btn-success">
							<i class="fa fa-print"></i> Cetak Report Transaksi
						</button>
					</a> --}}
					@endif
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Nama Siswa</th>
							<th>NISN</th>
							<th>Kelas</th>
							<th>Ket.</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($transaksi as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->nama_siswa }}</td>
								<td>{{ $data->nisn }}</td>
								<td>{{ $data->nama_kelas }}</td>
								<td>{{ $data->ket != '' ? $data->ket : '-' }}</td>
								<td>
									@if(Auth::user()->level==1)
										<a href="{{ url('/petugas/lihat-transaksi',$data->id_transaksi) }}">
											<button class="btn btn-info">
												Lihat Transaksi
											</button>
										</a>{{-- 
										<a href="{{ url('/cetak/petugas/data-transaksi') }}">
											<button class="btn btn-success">
												Cetak Transaksi
											</button>
										</a> --}}
										<a href="{{ url('/delete/petugas/data-transaksi',$data->id_transaksi) }}" onclick="return confirm('Yakin Hapus ?');">
											<button class="btn btn-danger">
												Hapus
											</button>
										</a>
									@elseif(Auth::user()->level==2)
										<a href="{{ url('/admin/lihat-transaksi',$data->id_transaksi) }}">
											<button class="btn btn-info">
												Lihat Transaksi
											</button>
										</a>{{-- 
										<a href="{{ url('/cetak/admin/data-transaksi') }}">
											<button class="btn btn-success">
												Cetak Transaksi
											</button>
										</a> --}}
										<a href="{{ url('/delete/admin/data-transaksi',$data->id_transaksi) }}" onclick="return confirm('Yakin Hapus ?');">
											<button class="btn btn-danger">
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
@section('javascript')
@if (Auth::user()->level==2)
	<script>
		$(function(){
			function notifikasi() {
				$.ajax({
					url: 'http://localhost:8000/notifikasi/admin',
					type: 'GET',
				})
				.done(function(param) {
					var obj = JSON.parse(param);
					$('#badges').html(obj.badges);
					$('#head-notif').html(obj.catat);
					$('#menu').html(obj.notif);
				})
				.fail(function() {
					console.log("error");
				})
			}
			notifikasi();
			setInterval(function(){
				notifikasi();
			},1000);
		});
	</script>
@elseif(Auth::user()->level==1)
	<script>
		$(function(){
			function notifikasi() {
				$.ajax({
					url: 'http://localhost:8000/notifikasi/petugas',
					type: 'GET',
				})
				.done(function(param) {
					var obj = JSON.parse(param);
					$('#badges').html(obj.badges);
					$('#head-notif').html(obj.catat);
					$('#menu').html(obj.notif);
				})
				.fail(function() {
					console.log("error");
				})
			}
			notifikasi();
			setInterval(function(){
				notifikasi();
			},1000);
		});
	</script>
@endif
@endsection