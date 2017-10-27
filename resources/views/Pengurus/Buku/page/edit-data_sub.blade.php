@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Edit Data Sub @endsection
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Edit Data Sub</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="">Kategori</label>
					<select name="kategori" id="" required>
						@foreach()
						<option value="{{}}">{{}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Sub Kategori</label>
					<input type="text" class="form-control" placeholder="Nama Sub Kategori" value="" required>
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