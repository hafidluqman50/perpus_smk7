@extends('Pengurus.layout.layout-app')
@section('title') Detail Buku @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Detail Buku</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					<label for="">Judul Buku :</label>
						<p class="form-control">{{ $buku->judul_buku }}</p>
					</div>
					<div class="form-group">
					<label for="">Pengarang :</label>
						<p class="form-control">{{ $buku->pengarang }}</p>
					</div>
					<div class="form-group">
					<label for="">Singkatan :</label>
						<p class="form-control">{{ $buku->sn_penulis }}</p>
					</div>
					<div class="form-group">
					<label for="">Penerbit :</label>
						<p class="form-control">{{ $buku->penerbit }}</p>
					</div>
					<div class="form-group">
					<label for="">Tempat Terbit :</label>
						<p class="form-control">{{ $buku->tempat_terbit }}</p>
					</div>
					<div class="form-group">
					<label for="">Tahun Terbit :</label>
						<p class="form-control">{{ $buku->tahun_terbit }}</p>
					</div>
					<div class="form-group">
					<label for="">Kategori Buku :</label>
						<p class="form-control">{{ $buku->kategori->nama_kategori }}</p>
					</div>
					<div class="form-group">
					<label for="">Stok Buku :</label>
						<p class="form-control">{{ $buku->stok_buku }}</p>
					</div>
					<div class="form-group">
					<label for="">Tanggal Upload :</label>
						<p class="form-control">{{ $buku->tanggal_upload }}</p>
					</div>
					<div class="form-group">
					<label for="">Foto Buku :</label>
						<img class="img-responsive" src="{{ $buku->foto_buku ? asset('/admin-assets/foto_buku/'.$buku->foto_buku) : '' }}" alt="">
					</div>
					<div class="form-group">
					<label for="">Keterangan :</label>
						<textarea class="form-control" cols="30" rows="10" readonly>{{ $buku->keterangan }}</textarea>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection