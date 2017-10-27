@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Data Barcode @endsection
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
@elseif(session()->has('edit'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-warning">
				{{ session('edit') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@elseif(session()->has('delete'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-danger">
				{{ session('delete') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
						Data Buku
					</p>
					<br/>
					<br/>
					@if (Auth::user()->level==1)
					<a href="{{ url('/petugas/tambah-data-barcode') }}">
						<button class="btn btn-primary">
							Tambah Data Barcode
						</button>
					</a>
					@elseif(Auth::user()->level==2)
					<a href="{{ url('/admin/tambah-data-barcode') }}">
						<button class="btn btn-primary">
							Tambah Data Barcode
						</button>
					</a>
					@endif
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Nomor Barcode</th>
							<th>Judul Buku</th>
							<th>Kode Buku</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($data_barcode as $no => $barcode)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $barcode->code_scanner }}</td>
								<td>{{ $barcode->buku->judul_buku }}</td>
								<td>{{ $barcode->kode_buku }}</td>
								<td>
								@if (Auth::user()->level==1)
									<a href="{{ url('/petugas/edit-data-barcode',$barcode->id_barcode) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/petugas/data-barcode',$barcode->id_barcode) }}">
										<button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?');">
											Hapus
										</button>
									</a>
								@elseif(Auth::user()->level==2)
									<a href="{{ url('/admin/edit-barcode',$barcode->id_barcode) }}">
										<button class="btn btn-warning">
											Edit
										</button>
									</a>
									<a href="{{ url('/delete/admin/data-barcode',$barcode->id_barcode) }}">
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