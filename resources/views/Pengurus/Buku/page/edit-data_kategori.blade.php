@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Edit Data Kategori @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Kategori</h3>
            </div>
            @if (Auth::user()->level==1)
        <form method="POST" action="{{ url('/update/petugas/data-kategori',$kategori->id_kategori_buku) }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
        <form method="POST" action="{{ url('/update/admin/data-kategori',$kategori->id_kategori_buku) }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
              <div class="box-body">
              	<div class="form-group">
              		<label for="">Nama Kategori</label>
              		<input type="text" name="nama" value="{{ $kategori->nama_kategori }}" class="form-control">
              	</div>
              	<div class="form-group">
              		<label for="">Deskripsi Kategori</label>
              		<textarea name="" id="" cols="30" rows="10" id="textarea" class="form-control"></textarea>
              	</div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Edit Data</button>
              </div>
            </form>
          </div>
         </div>
    </div>
@endsection