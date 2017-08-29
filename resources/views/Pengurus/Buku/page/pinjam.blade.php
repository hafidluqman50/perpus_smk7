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
		                  	<option value="{{ $kelas }}">{{ $kelas }}</option>
		                  @endforeach
		                </select>
		              	</div>
		              	<div class="form-group">
		              		<label>Nama Siswa</label>
		              		<select name="siswa" class="form-control select2 siswa" disabled>
		              			<option value=""></option>
		              		</select>
		              	</div>
		              	<div class="form-group">
		                <label>Judul Buku</label>
		                <select name="buku" class="form-control select2" style="width: 100%;">
		                  <option disabled selected>=============</option>
		                  @foreach ($buku as $buku)
		                  <option value="{{ $buku->id_buku }}">{{ $buku->judul_buku }}</option>
		                  @endforeach
		                </select>
		              	</div>
		              	<div class="form-group">
		              		<label for="">Tanggal Pinjam</label>
		              		<input class="form-control date2" type="text" name="tanggal_pinjam" placeholder="Tanggal Pinjam">
		              	</div>
		              	<div class="form-group">
		              		<label for="">Tanggal Harus Kembalikan</label>
		              		<input class="form-control date2" type="text" name="tanggal_jatuh_tempo" placeholder="Tanggal Harus Kembalikan">
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
		$('.kelas').change(function() {
			var kelas = $(this).val();
			// alert(kelas);
			
			$.ajax({
				url: 'http://localhost:8000/siswa/'+kelas,
				type: 'GET',
			})
			.done(function(param){
				$('.siswa').attr('disabled',false);
				$('.siswa').append('<option value="" selected disabled>Pilih Siswa</option>');
				$('.siswa').each(function(){
					$(this).append(param);
				});
			})
			.fail(function(error){
				$('.response').html(error['responseText']);
				// $('.siswa').attr('disabled',false);
				// $('.siswa').append('<option value="" selected disabled>Pilih Siswa</option>');
				// $('.siswa').each(function(){
				// 	$(this).append(error['responseText']);
				// });
			})
		});
	</script>
@endsection