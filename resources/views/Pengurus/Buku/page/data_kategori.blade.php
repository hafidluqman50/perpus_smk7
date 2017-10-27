@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Data Kategori @endsection
@section('content')
@if (session()->has('dlt_ktgr'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success">
				{{ session('dlt_ktgr') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
						Data Kategori
					</p>
					<br/>
					<br/>
					<a href="{{ url('/admin/tambah-data-kategori') }}">
						<button class="btn btn-primary">
							Tambah Data Kategori
						</button>
					</a>
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
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
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Data Sub Kategori
					</p>
					<br/>
					<br/>
					<a href="{{ url('/admin/tambah-data-sub') }}">
						<button class="btn btn-primary">
							Tambah Sub Kategori
						</button>
					</a>
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>ID Sub Kategori</th>
							<th>Nama Sub</th>
							<th>Nama Kategori</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($sub as $no => $sub)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $sub->id_sub_ktg }}</td>
								<td>{{ $sub->nama_sub }}</td>
								<td>{{ $sub->kategori->nama_kategori }}</td>
								<td>
									<a href="{{ url('/admin/edit-data-sub',$kategori->id_kategori_buku) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/admin/data-sub-kategori',$kategori->id_kategori_buku) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?');">
											Hapus
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