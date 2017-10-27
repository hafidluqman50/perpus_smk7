@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Data Siswa @endsection
@section('content')
@if (session()->has('log'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-danger">
				{{ session('log') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@elseif(session()->has('success'))
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-success">
			{{ session('success') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
						Data Siswa
					</p>
					<br/>
					<br/>
					@if(Auth::user()->level==2)
					<a href="{{ url('/admin/import-siswa') }}">
						<button class="btn btn-success">
							Import Siswa
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
							<th>Kelas</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($siswa as $no => $siswa)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $siswa->nama_siswa }}</td>
								<td>{{ $siswa->nisn }}</td>
								<td>{{ $siswa->nama_kelas }}</td>
								<td>@if ($siswa->status==1)
									<small class="label label-success">Akun Aktif</small>
									@else
									<small class="label label-danger">Akun Non-Aktif</small>
								@endif</td>
								<td>
									<a href="{{ url('/admin/siswa-detail',$siswa->id_siswa) }}">
										<button class="btn btn-info">
											Info Siswa
										</button>
									</a>
									@if ($siswa->status==1)
										<a href="{{ url('/admin/siswa/akun/nonaktif',$siswa->username) }}">
											<button class="btn btn-danger">
												Non-Aktifkan Akun
											</button>
										</a>
									@else
										<a href="{{ url('/admin/siswa/akun/aktif',$siswa->username) }}">
											<button class="btn btn-success">
												Aktifkan Akun
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