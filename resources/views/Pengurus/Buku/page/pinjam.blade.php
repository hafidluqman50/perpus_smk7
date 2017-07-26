@extends('Pengurus.layout.layout-app')
@section('title') Pinjam Buku @endsection
@section('content')
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
		                <label>Nama Siswa</label>
		                <select name="siswa" class="form-control select2" style="width: 100%;">
		                  <option disabled selected>=============</option>
		                  @foreach ($siswa as $siswa)
		                  <option value="{{ $siswa->id_siswa }}">{{ $siswa->nama_siswa }}</option>
		                  @endforeach
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
		              		<label for="">Stok Pinjam</label>
		              		<input class="form-control" type="number" name="stok" placeholder="Stok Pinjam">
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