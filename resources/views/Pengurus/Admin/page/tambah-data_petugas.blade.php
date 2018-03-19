@extends('Pengurus.layout.layout-app')
@section('title') Tambah Data Petugas @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Buku</h3>
            </div>
            <form method="POST" action="{{ url('/insert/admin/data-petugas') }}" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
              <div class="form-group">
              	<label for="">Username</label>
              	<input type="text" name="username" class="form-control">
              </div>
              <div class="form-group">
              	<label for="">Password</label>
              	<input type="password" name="password" class="form-control">
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
@if (Auth::user()->level==2)
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