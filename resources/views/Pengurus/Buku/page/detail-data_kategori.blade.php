@extends('Pengurus.layout.layout-app')
@section('title') Detail Data Kategori @endsection
@section('content')
<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Detail Kategori</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					<label for="">Nama Kategori :</label>
						<p class="form-control">{{ $kategori->nama_kategori }}</p>
					</div>
					<div class="form-group">
					<label for="">Deskripsi Kategori :</label>
						<p class="form-control">{{ $kategori->deskripsi_kategori }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection