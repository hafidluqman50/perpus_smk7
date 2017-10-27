@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Petugas @endsection
@section('content')
	{{-- @if ($petugas->nama_petugas==null && $petugas->nip==null && $petugas->jenis_kelamin==null)
		<h1>Silahkan Lengkapi Profile Anda Terlebih Dahulu <a href="{{ url('/profile-petugas') }}">Disini</a></h1>
	@else
		<h1>Selamat Datang {{ Auth::user()->username }}</h1>
		<img src="{{ asset('petugas_profile/'.$petugas->foto_profile) }}" alt="">
		<ul>
			<li><a href="{{ url('/petugas/data-buku') }}">Data Buku</a></li>
			<li><a href="{{ url('/data-peminjaman') }}">Data Peminjaman</a></li>
			<li><a href="{{ url('/data-pengembalian') }}">Data Pengembalian</a></li>
		</ul>
	@endif
	<h4><a href="{{ url('/logout') }}">Logout</a></h4> --}}
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						Dashboard
					</h3>
				</div>
				<div class="box-body">
				@if ($petugas->nama_petugas==null && $petugas->nip==null && $petugas->jenis_kelamin==null)
					<h4>Silahkan Lengkapi Profile Anda Terlebih Dahulu <a href="{{ url('/profile-petugas') }}">Disini</a></h4>
				@else
				<h1>Selamat Datang {{ Auth::user()->username }}</h1>{{-- 
				<img class="img-responsive" style="width:20%; height:200px;border-radius:100%;" src="{{ asset('petugas_profile/'.$petugas->foto_profile) }}" alt=""> --}}
				@endif
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