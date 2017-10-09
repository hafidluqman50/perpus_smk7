@extends('Pengurus.layout.layout-app')
@section('title') Import Data Siswa @endsection
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Import Siswa</h3>
            </div>
            @if (Auth::user()->level==1)
            <form method="POST" action="{{ url('/import/petugas/data-siswa') }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
            <form method="POST" action="{{ url('/import/admin/data-siswa') }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
              <div class="box-body">
              	<div class="form-group">
              		<label for="">Import Siswa</label>
              		<input type="file" class="form-control" name="import_siswa">
              	</div>
              	<div class="form-group">
              		<label for="">Import Foto Siswa</label>
              		<input type="file" class="form-control" name="zip_foto_siswa">
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