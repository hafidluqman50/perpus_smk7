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
							<label for="">Buku</label>
							<select name="buku[]" id="buku" class="form-control select2" multiple disabled></select>
						</div>
						<div class="form-group">
							<label for="">Tanggal Kembali</label>
							<input type="text" name="tgl_kmbli" class="form-control date2 tanggal" disabled>
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

	$('#siswa').change(function(){
		var siswa = $(this).val();

		$.ajax({
			url: 'http://localhost:8000/siswa/buku/pinjam/'+siswa,
			type: 'GET',
		})
		.done(function(param) {
			$('#buku').attr('disabled',false);
			$('.tanggal').attr('disabled',false);
			$('#buku').attr('data-placeholder','Pilih Buku');
			$('#buku').each(function(){
				$(this).html(param);
			});;
		})
		.fail(function(error) {
			$('h1').html(error['responseText']);
		})
	});
</script>
@endsection