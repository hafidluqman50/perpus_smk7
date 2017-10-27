@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Tambah Data Buku @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              @if(Auth::user()->level==1)
              <a href="{{ url('/petugas/data-buku') }}">
                <button class="btn btn-primary">
                  <span class="fa fa-arrow-left"></span> Kembali
                </button>
              </a>
              @elseif(Auth::user()->level==2)
              <a href="{{ url('/admin/data-buku') }}">
                <button class="btn btn-primary">
                  <span class="fa fa-arrow-left"></span> Kembali
                </button>
              </a>
              @endif
              &nbsp;
              <h3 class="box-title">Tambah Data Buku</h3>
            </div>
            @if (Auth::user()->level==1)
            <form method="POST" action="{{ url('/insert/petugas/data-buku') }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
            <form method="POST" action="{{ url('/insert/admin/data-buku') }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" id="exampleInputEmail1" placeholder="Judul Buku" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nomor Induk</label>
                        <input type="text" name="nomor_induk" class="form-control" placeholder="Nomor Induk" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nomor Klasifikasi</label>
                        <input type="text" name="nomor_klasifikasi" class="form-control" placeholder="Nomor Klasifikasi" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" id="exampleInputEmail1" placeholder="Pengarang" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Singkatan Penulis</label>
                        <input type="text" name="sn_penulis" class="form-control" id="exampleInputEmail1" placeholder="Singkatan Penulis" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="exampleInputPassword1" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Terbit</label>
                        <input type="text" name="tempat_terbit" class="form-control" id="exampleInputPassword1" placeholder="Tempat Terbit" required>
                    </div>
                    <div class="form-group">
                      <label for="">Foto Buku</label>
                        <input type="file" name="foto_buku" id="image" required>
                        <br>
                        <img class="img-responsive" id="uploadPreview">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="">Tahun Terbit</label>
                      <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input type="text" class="form-control pull-right" name="tahun_terbit" id="datepicker" placeholder="Tahun Terbit" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <label>Kategori Buku</label>
                      <select name="kategori_buku" class="form-control select2" id="kategori" style="width: 100%;">
                        <option disabled selected>=============</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori_buku }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                      </select>
                  	</div>
                    <div class="form-group">
                      <label for="">Sub Kategori</label>
                        <select name="sub_kategori" class="form-control select2" id="sub" style="width:100%;" disabled required></select>
                    </div>
                  	<div class="form-group">
                  		<label for="">Jumlah Eksemplar</label>
                  		  <input type="number" name="jumlah_eksemplar" class="form-control" placeholder="Jumlah Eksemplar" required>
                  	</div>
                    <div class="form-group">
                      <label for="">Stok Buku</label>
                        <input type="number" name="stok_buku" class="form-control" placeholder="Stok Buku" required>
                    </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="" cols="30" rows="10" required></textarea>
                    </div>
                  </div>
                </div>
              <div align="center">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
              </div>
            </form>
          </div>
         </div>
    </div>
@endsection

@section('javascript')
<script>
$(function(){
  $("#image").change(function(){
    var file = document.getElementById("image").files[0];
    var readImg = new FileReader();
    readImg.readAsDataURL(file);
    readImg.onload = function(e) {
       $('#uploadPreview').attr('src',e.target.result).fadeIn();
    }
  })
  $('#kategori').change(function(){
    var kategori = $(this).val();
    $.ajax({
      url: 'http://localhost:8000/buku/kategori/'+kategori,
      type: 'GET',
    })
    .done(function(param) {
      $('#sub').attr('disabled',false);
      $('#sub').each(function(){
        $(this).html(param);
      });
    })
    .fail(function(error) {
      console.log(error.ResponseText);
    });
  });
});
</script>@if (Auth::user()->level==2)
  <script>
    $(function(){
      function notifikasi() {
        $.ajax({
          url: 'http://localhost:8000/notifikasi/admin',
          type: 'GET',
        })
        .done(function(param) {
          var obj = JSON.parse(param);
          $('#badges').html(obj.badges);
          $('#head-notif').html(obj.catat);
          $('#menu').html(obj.notif);
        })
        .fail(function() {
          console.log("error");
        })
      }
      notifikasi();
      setInterval(function(){
        notifikasi();
      },1000);
    });
  </script>
@elseif(Auth::user()->level==1)
  <script>
    $(function(){
      function notifikasi() {
        $.ajax({
          url: 'http://localhost:8000/notifikasi/petugas',
          type: 'GET',
        })
        .done(function(param) {
          var obj = JSON.parse(param);
          $('#badges').html(obj.badges);
          $('#head-notif').html(obj.catat);
          $('#menu').html(obj.notif);
        })
        .fail(function() {
          console.log("error");
        })
      }
      notifikasi();
      setInterval(function(){
        notifikasi();
      },1000);
    });
  </script>
@endif
@endsection