@extends('Main.layout.layout-app')
@section('title') Detail Transaksi @endsection
@section('content')
<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Detail Transaksi</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					<label for="">Nama Siswa : </label>
						<p class="form-control">{{ $kategori->nama_kategori }}</p>
					</div>
					<div class="form-group">
						<label for="">NISN : </label>
						<p class="form-control"></p>
					</div>
					<div class="form-group">
						<label for="">Judul Buku : </label>
						<p class="form-control"></p>
					</div>
					<div class="form-group">
						<label for="">Penerbit : </label>
						<p class="form-control"></p>
					</div>
					<div class="form-group">
						<label for="">Tahun Terbit : </label>
						<p class="form-control"></p>
					</div>
					<div class="form-group">
						<label for="">Stok Pinjam : </label>
						<p class="form-control"></p>
					</div>
					<div class="form-group">
						<label for="">Tanggal Pinjam : </label>
						<p class="form-control"></p>
					</div>
					<div class="form-group">
						<label for="">Tanggal Harus Kembalikan : </label>
						<p class="form-control"></p>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection