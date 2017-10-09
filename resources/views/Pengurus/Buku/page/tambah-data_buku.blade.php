@extends('Pengurus.layout.layout-app')
@section('title') Tambah Data Buku @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Buku</h3>
            </div>
            @if (Auth::user()->level==1)
            <form method="POST" action="{{ url('/insert/petugas/data-buku') }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
            <form method="POST" action="{{ url('/insert/admin/data-buku') }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Buku</label>
                  <input type="text" name="judul_buku" class="form-control" id="exampleInputEmail1" placeholder="Judul Buku">
                </div>
                <div class="form-group">
                  <label for="">Nomor Klasifikasi</label>
                  <input type="text" name="nomor_klasifikasi" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pengarang</label>
                  <input type="text" name="pengarang" class="form-control" id="exampleInputEmail1" placeholder="Pengarang">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Singkatan Penulis</label>
                  <input type="text" name="sn_penulis" class="form-control" id="exampleInputEmail1" placeholder="Singkatan Penulis">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" id="exampleInputPassword1" placeholder="Penerbit">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tempat Terbit</label>
                  <input type="text" name="tempat_terbit" class="form-control" id="exampleInputPassword1" placeholder="Tempat Terbit">
                </div>
                <div class="form-group">
                  <label for="">Tahun Terbit</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="tahun_terbit" id="datepicker" placeholder="Tahun Terbit">
                  </div>
                </div>
                <div class="form-group">
                <label>Kategori Buku</label>
                <select name="kategori_buku" class="form-control select2" style="width: 100%;">
                  <option disabled selected>=============</option>
                  @foreach ($kategoris as $kategori)
                  <option value="{{ $kategori->id_kategori_buku }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
              	</div>
              	<div class="form-group">
              		<label for="">Jumlah Eksemplar</label>
              		<input type="number" name="jumlah_eksemplar" class="form-control" placeholder="Jumlah Eksemplar">
              	</div>
                <div class="form-group">
                  <label for="">Stok Buku</label>
                  <input type="number" name="stok_buku" class="form-control" placeholder="Stok Buku">
                </div>
              	<div class="form-group">
              		<label for="">Foto Buku</label>
              		<input type="file" name="foto_buku" id="image">
                  <br>
                  <img class="img-responsive" id="uploadPreview">
              	</div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
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