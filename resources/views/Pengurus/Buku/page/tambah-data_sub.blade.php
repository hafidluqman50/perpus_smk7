@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Tambah Data Sub @endsection
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Data Sub</h3>
			</div>
			<form action="{{ url('/insert/admin/data-sub-kategori') }}" method="POST">
			<div class="box-body">
				<div class="form-group">
					<label for="">Kategori</label>
					<select name="kategori" id="" class="form-control select2" required>
					<option selected disabled>Pilih Kategori</option>
					@foreach($kategori as $kategori)
						<option value="{{ $kategori->id_kategori_buku }}">{{ $kategori->nama_kategori }}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Sub Kategori</label>
					<input type="text" name="sub_kategori" class="form-control" placeholder="Nama Sub Kategori" required>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary">
					Simpan
				</button>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection