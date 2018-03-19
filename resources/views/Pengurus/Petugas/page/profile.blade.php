@extends('Pengurus.layout.layout-app')
@section('title') Profile @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Profile</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					<label for="">Username :</label>
						<p class="form-control">{{ $get->username }}</p>
					</div>
					<div class="form-group">
					<label for="">Nama Petugas :</label>
						<p class="form-control">{{ $get->nama_petugas }}</p>
					</div>
					<div class="form-group">
					<label for="">NIP :</label>
						<p class="form-control">{{ $get->nip }}</p>
					</div>
					<div class="form-group">
					<label for="">Jenis Kelamin :</label>
						<p class="form-control">{{ $get->jenis_kelamin }}</p>
					</div>
					<div class="form-group">
					<label for="">Foto Profile :</label>
						<img class="img-responsive" style="width:50%; height:500px; margin:auto; border-radius:100%;" src="{{ $get->foto_profile ? asset('/petugas_profile/'.$get->foto_profile) : '' }}" alt="">
					</div>
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