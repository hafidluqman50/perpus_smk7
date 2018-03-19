@extends('Pengurus.layout.layout-app')
@section('title') Kembalikan Buku @endsection
@section('content')
<h1></h1>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					Pengembalian
				</div>
				<div class="box-body">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="">Kelas Siswa</label>
							<select id="kelas" class="form-control select2">
								<option value="">Pilih Kelas</option>
							@foreach ($kelas as $kelas)
								<option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
							@endforeach
							</select>
						</div>
						@if(Auth::user()->level==1)
						<form action="{{ url('/kembali/petugas/buku') }}" method="POST">
						@elseif(Auth::user()->level==2)
						<form action="{{ url('/kembali/admin/buku') }}" method="POST">
						@endif
						{{ csrf_field() }}
						<div class="form-group">
							<label for="">Nama Siswa</label>
							<select name="siswa" id="siswa" class="form-control select2" disabled></select>
						</div>
						<div class="form-group">
							<label for="">Barcode</label>
							<input type="text" id="barcode" class="form-control" placeholder="Barcode">
						</div>
						<div class="form-group insert">
							<label for="">Buku</label>
							<select name="buku[]" class="form-control select2 jdl_buku" multiple></select>
						</div>
						<div class="form-group">
							<label for="">Tanggal Kembali</label>
							<input type="text" name="tgl_kmbli" class="form-control date2 tanggal">
						</div>
						<button class="btn btn-primary">Kembalikan Buku</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
<script>
	$('#kelas').change(function(){
		var kelas = $(this).val();
		$.ajax({
			url: 'http://localhost:8000/siswa/'+kelas,
			type: 'GET',
		})
		.done(function(param) {
			$('#siswa').attr('disabled',false);
			$('#siswa').append('<option disabled selected>Pilih Siswa</option>');
			$('#siswa').each(function(){
				$(this).html(param);
			});
		})
		.fail(function(error) {
			console.log(error);
		})
	});

	$('form').on('keydown','#barcode',function(e){
			var barcode = $(this).val();
			if (e.keyCode==13) {
				e.preventDefault();
			}
			$(this).data('timer',setTimeout(function(){
				if (barcode != "") {
					$.ajax({
						url: 'http://localhost:8000/barcode/buku/'+barcode,
						type: 'GET',
					})
					.done(function(param) {
						var data = param.split("|");
						$('#barcode').val('');
						$('.jdl_buku').each(function(){
							$(this).append(data[0]);
						});
						$('.insert').each(function(){
							$(this).append(data[1]);
						});
					})
					.fail(function(error) {
						console.log(error);
					});
				}
			}),0);
		});
	// $('#siswa').change(function(){
	// 	var siswa = $(this).val();

	// 	$.ajax({
	// 		url: 'http://localhost:8000/siswa/buku/pinjam/'+siswa,
	// 		type: 'GET',
	// 	})
	// 	.done(function(param) {
	// 		$('#buku').attr('disabled',false);
	// 		$('.tanggal').attr('disabled',false);
	// 		$('#buku').attr('data-placeholder','Pilih Buku');
	// 		$('#buku').each(function(){
	// 			$(this).html(param);
	// 		});;
	// 	})
	// 	.fail(function(error) {
	// 		$('h1').html(error['responseText']);
	// 	})
	// });

	// $('form').on('keydown','#barcode',function(e){
	// 		var barcode = $(this).val();
	// 		if (e.keyCode==13) {
	// 			e.preventDefault();
	// 		}
	// 		$(this).data('timer',setTimeout(function(){
	// 			if (barcode != "") {
	// 				$.ajax({
	// 					url: 'http://localhost:8000/barcode/buku/'+barcode,
	// 					type: 'GET',
	// 				})
	// 				.done(function(param) {
	// 					var data = param.split("|");
	// 					$('#barcode').val('');
	// 					$('.jdl_buku').each(function(){
	// 						$(this).append(data[0]);
	// 					});
	// 					$('form').each(function(){
	// 						$(this).prepend(data[1]);
	// 					});
	// 				})
	// 				.fail(function(error) {
	// 					console.log(error);
	// 				});
	// 			}
	// 		}),0);
	// 	});
</script>
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