@extends('Main.layout.layout-app')
@section('title') Detail Pengembalian @endsection
@section('content')
<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Detail Pengembalian</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					<label for="">Nama Siswa : </label>
						<p class="form-control">{{ $transaksi->nama_siswa }}</p>
					</div>
					<div class="form-group">
						<label for="">NISN : </label>
						<p class="form-control">{{ $transaksi->nisn }}</p>
					</div>
					<div class="form-group">
						<label for="">Judul Buku : </label>
						<p class="form-control">{{ $transaksi->judul_buku }}</p>
					</div>
					<div class="form-group">
						<label for="">Penerbit : </label>
						<p class="form-control">{{ $transaksi->penerbit }}</p>
					</div>
					<div class="form-group">
						<label for="">Tahun Terbit : </label>
						<p class="form-control">{{ $transaksi->tahun_terbit }}</p>
					</div>
					<div class="form-group">
						<label for="">Stok Pinjam : </label>
						<p class="form-control">{{ $transaksi->stok_pinjam }}</p>
					</div>
					<div class="form-group">
						<label for="">Tanggal Kembalikan : </label>
						<p class="form-control">{{ $transaksi->tanggal_kembalikan_buku }}</p>
					</div>
					<div class="form-group">
						<label for="">Denda : </label>
						<p class="form-control">{{ $transaksi->denda }}</p>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection