@extends('Pengurus.layout.layout-app')
@section('title') Edit Data @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Buku</h3>
            </div>
            @if (Auth::user()->level==1)
            <form method="POST" action="{{ url('/update/petugas/data-buku',$buku->id_buku) }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
            <form method="POST" action="{{ url('/update/admin/data-buku',$buku->id_buku) }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Buku</label>
                  <input type="text" name="judul_buku" class="form-control" id="exampleInputEmail1" placeholder="Judul Buku" value="{{ $buku->judul_buku }}">
                </div>
                <div class="form-group">
                  <label for="">Pengarang</label>
                  <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}">
                </div>
                <div class="form-group">
                  <label for="">Singkatan Penulis</label>
                  <input type="text" name="sn_penulis" class="form-control" value="{{ $buku->sn_penulis }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" id="exampleInputPassword1" value="{{ $buku->penerbit }}">
                </div>
                <div class="form-group">
                  <label for="">Tempat Terbit</label>
                  <input type="text" name="tempat_terbit" class="form-control" value="{{ $buku->tempat_terbit }}">
                </div>
                <div class="form-group">
                  <label for="">Tahun Terbit</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="tahun_terbit" id="datepicker" placeholder="Tahun Terbit" value="{{ $buku->tahun_terbit }}">
                  </div>
                </div>
                <div class="form-group">
                <label>Kategori Buku</label>
                <select name="kategori_buku" class="form-control select2" style="width: 100%;">
                  @foreach ($kategoris as $kategori)
                  	<option value="{{ $buku->id_kategori_buku }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
              	</div>
              	<div class="form-group">
              		<label>Jumlah Eksemplar</label>
              		<input type="number" name="jumlah_eksemplar" class="form-control" placeholder="Jumlah Eksemplar" value="{{ $buku->jumlah_eksemplar }}">
              	</div>
              	<div class="form-group">
                  <label for="">Foto Buku</label>
              		<input type="file" name="foto_buku" id="image">
                  <br>
                  <img class="img-responsive" src="{{ asset('/admin-assets/foto_buku/'.$buku->foto_buku) }}" alt="" id="uploadPreview">
              	</div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <textarea class="form-control" name="keterangan" id="" cols="30" rows="10">{{ $buku->keterangan }}</textarea>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Edit Data</button>
              </div>
            </form>
          </div>
         </div>
    </div>
@endsection

@section('javascript')
<script>
$(document).ready(function(){
  $("#image").change(function(){
    var file = document.getElementById("image").files[0];
    var readImg = new FileReader();
    readImg.readAsDataURL(file);
    readImg.onload = function(e) {
       $('#uploadPreview').attr('src',e.target.result).fadeIn();
    }
  })
});
</script>
@endsection