@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Import Data Buku @endsection
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
              <h3 class="box-title">Import Data Buku</h3>
            </div>
            @if (Auth::user()->level==1)
            <form method="POST" action="{{ url('/import/petugas/data-buku') }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
            <form method="POST" action="{{ url('/import/admin/data-buku') }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
              <div class="box-body">
              	<div class="form-group">
              		<label for="">Import Buku</label>
              		<input type="file" class="form-control" name="import">
              	</div>
              	<div class="form-group">
              		<label for="">Import Foto Buku</label>
              		<input type="file" class="form-control" name="zip">
              	</div>
              </div>
              <div class="box-footer">
              	<button class="btn btn-primary">
              		Import Data
              	</button>
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