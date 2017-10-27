@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Tambah Data Sub @endsection
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				@if(Auth::user()->level==1)
              <a href="{{ url('/petugas/data-kategori') }}">
                <button class="btn btn-primary">
                  <span class="fa fa-arrow-left"></span> Kembali
                </button>
              </a>
              @elseif(Auth::user()->level==2)
              <a href="{{ url('/admin/data-kategori') }}">
                <button class="btn btn-primary">
                  <span class="fa fa-arrow-left"></span> Kembali
                </button>
              </a>
              @endif
				<h3 class="box-title">Tambah Data Sub</h3>
			</div>
			<form action="{{ url('/insert/admin/data-sub-kategori') }}" method="POST">
			<div class="box-body">
				<div class="form-group">
					<label for="">Kategori</label>
					<select name="kategori" id="" class="form-control select2" required>
					<option selected disabled>Pilih Kategori</option>
					@foreach($kategori as $kategori)
						<option value="{{ $kategori->id_kategori_buku }}">{{ $kategori->nama_kategori }}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Sub Kategori</label>
					<input type="text" name="sub_kategori" class="form-control" placeholder="Nama Sub Kategori" required>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary">
					Simpan
				</button>
			</div>
			</form>
		</div>
	</div>
</div>@if (Auth::user()->level==2)
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