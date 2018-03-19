@extends('Pengurus.layout.layout-app')
@section('title') Pinjam Buku @endsection
@section('content')
<h1 class="response"></h1>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					Pinjam Buku
				</div>
				<div class="box-body">
					<div class="col-xs-6">
					@if (Auth::user()->level==1)
					<form action="{{ url('/pinjam/petugas/data-peminjaman') }}" method="POST">
					{{ csrf_field() }}
					@elseif(Auth::user()->level==2)
					<form action="{{ url('/pinjam/admin/data-peminjaman') }}" method="POST">
					{{ csrf_field() }}
					@endif
						<div class="form-group">
		                <label>Kelas Siswa</label>
		                <select class="form-control select2 kelas" style="width: 100%;">
		                  <option disabled selected>=============</option>
		                  @foreach ($kelas as $kelas)
		                  	<option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
		                  @endforeach
		                </select>
		              	</div>
		              	<div class="form-group">
		              		<label>Nama Siswa</label>
		              		<select name="siswa" class="form-control select2 siswa" disabled>
		              		</select>
		              	</div>
		              	<div class="form-group">
		              	<label for="">Barcode</label>
		              	<input type="text" class="form-control" id="barcode" placeholder="Barcode">
		              	</div>
		              	<div class="form-group insert">
		                <label>Judul Buku</label>
		                <select name="buku[]" class="form-control select2 jdl_buku" style="width: 100%;" multiple="multiple" data-placeholder="Judul Buku" required>
		                </select>
		              	</div>
		              	<div class="form-group">
		              		<label for="">Tanggal Pinjam</label>
		              		<input class="form-control date2" id="tgl_pnjm" type="text" name="tgl_pnjm" placeholder="Tanggal Pinjam">
		              		<p></p>
		              	</div>
		              	<div class="form-group">
		              		<label for="">Tanggal Harus Kembalikan</label>
		              		<input class="form-control" id="tgl_jth_tmpo" type="text" name="tgl_jth_tmpo" placeholder="Tanggal Jatuh Tempo"  readonly>
		              		<p></p>
		              	</div>
		              	<button class="btn btn-primary">Pinjam buku</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
	<script>
	var timeout;
	function TanggalIndo(data)
	{
		var data = data.split('-');
		if (data[1] == 1) {
			data[1] = 'Januari';
		} else if (data[1] == 2) {
			data[1] = 'Februari';
		} else if (data[1] == 3) {
			data[1] = 'Maret';
		} else if (data[1] == 4) {
			data[1] = 'April';
		} else if (data[1] == 5) {
			data[1] = 'Mei';
		} else if (data[1] == 6) {
			data[1] = 'Juni';
		} else if (data[1] == 7) {
			data[1] = 'Juli';
		} else if (data[1] == 8) {
			data[1] = 'Agustus';
		} else if (data[1] == 9) {
			data[1] = 'September';
		} else if (data[1] == 10) {
			data[1] = 'Oktober';
		} else if (data[1] == 11) {
			data[1] = 'November';
		} else if (data[1] == 12) {
			data[1] = 'Desember';
		} else {
			data[1] = '-';
		}
		return (data[2]+' '+data[1]+' '+data[0]);
	}

		$('.kelas').change(function() {
			var kelas = $(this).val();
			
			$.ajax({
				url: 'http://localhost:8000/siswa/'+kelas,
				type: 'GET',
			})
			.done(function(param){
				$('.siswa').attr('disabled',false);
				$('.siswa').each(function(){
					$(this).html(param);
				});
			})
			.fail(function(error){
				$('.response').html(error['responseText']);
			})
		});

		$('#tgl_pnjm').change(function(){
			var tgl_pnjm = $(this).val();
			$.ajax({
				url: 'http://localhost:8000/dua-minggu/'+tgl_pnjm,
				type: 'GET',
			})
			.done(function(param) {
				$('#tgl_jth_tmpo').val(param);
				$('#tgl_jth_tmpo ~ p').text(TanggalIndo(param));
				$('#tgl_pnjm ~ p').text(TanggalIndo(tgl_pnjm));
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
	</script>@if (Auth::user()->level==2)
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