@extends('Pengurus.layout.layout-app')
@section('title') Tambah Data Kategori @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              @if(Auth::user()->level==1)
              <a href="{{ url('/petugas/data-kategori') }}">
                <button class="btn btn-primary">
                  <span class="fa fa-arrow-left"></span> Kembali
                </button>
              </a>
              @elseif(Auth::user()->level==2)
              <a href="{{ url('/admin/data-kategori') }}">
                <button class="btn btn-primary">
                  <span class="fa fa-arrow-left"></span> Kembali
                </button>
              </a>
              @endif
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
                  <label for="exampleInputPassword1">Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" id="exampleInputPassword1" placeholder="Penerbit">
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
              		<label for="">Stok Buku</label>
              		<input type="number" name="stok" class="form-control" placeholder="Stok Buku">
              	</div>
              	<div class="form-group">
              		<label for="">Foto Buku</label>
              		<input type="file" name="foto_buku">
              	</div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
              </div>
            </form>
          </div>
         </div>
    </div>@if (Auth::user()->level==2)
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