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
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Username</th>
							<th>Nama Petugas</th>
							<th>NIP</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($data_petugas as $no => $petugas)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $petugas->username }}</td>
								<td>@if($petugas->nama_petugas != ''){{ $petugas->nama_petugas }}@else-@endif</td>
								<td>@if($petugas->nip != ''){{ $petugas->nip }}@else-@endif</td>
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