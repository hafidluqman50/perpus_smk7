@extends('Pengurus.layout.layout-app')
@section('title') Kembalikan Buku @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					Kembalikan Buku
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Siswa</label>
						<input type="text" class="form-control" value="{{ $transaksi->nama_siswa }}" disabled>
					</div>
					<div class="form-group">
						<label for="">Judul Buku</label>
						<input type="text" class="form-control" value="{{ $transaksi->judul_buku }}" disabled>
					</div>
					<div class="form-group">
						<label for="">Tanggal Pinjam</label>
						<input type="text" class="form-control" value="{{ $transaksi->tanggal_pinjam_buku }}" disabled>
					</div>
					<div class="form-group">
						<label for="">Tanggal Harus Kembalikan</label>
						<input type="text" class="form-control" value="{{ $transaksi->tanggal_jatuh_tempo }}" disabled>
					</div>
					@if (Auth::user()->level==1)
					<form action="{{ url('/kembali/petugas/data-pengembalian',$transaksi->id_transaksi) }}" method="POST">
					@elseif(Auth::user()->level==2)
					<form action="{{ url('/kembali/admin/data-pengembalian',$transaksi->id_transaksi) }}" method="POST">
					@endif
					{{ csrf_field() }}
					<div class="form-group">
						<label for="">Tanggal Kembalikan</label>
						<input type="text" class="form-control date2" name="tanggal_kembali" placeholder="Tanggal Kembali">
					</div>
					<div class="form-group">
					<label for="">Status</label>
					<select name="status" class="form-control">
						<option value="" selected disabled>==============</option>
						<option value="1">Belum Kembali</option>
						<option value="2">Sudah Kembali</option>
					</select>
					</div>
						<button class="btn btn-primary">
							Kembalikan Buku
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection