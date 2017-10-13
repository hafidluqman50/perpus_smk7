@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Tambah Data Barcode @endsection
@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Buku</h3>
            </div>
            @if (Auth::user()->level==1)
            <form method="POST" action="{{ url('/insert/petugas/data-barcode') }}" role="form" enctype="multipart/form-data">
            @elseif(Auth::user()->level==2)
            <form method="POST" action="{{ url('/insert/admin/data-barcode') }}" role="form" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
             <div class="box-body">
                <div class="form-group">
                <label for="buku1">Buku</label>
	                <select name="buku" id="buku1" class="form-control select2">
	                	<option value="" selected disabled>Pilih Data Buku</option>
						@foreach($bukus as $buku)
	                	<option value="{{ $buku->id_buku }}">{{ $buku->judul_buku }}</option>
	                	@endforeach
	                </select>
              	</div>
                <div class="form-group">
                  <label for="barcode1">Barcode</label>
                  <input type="text" name="barcode" class="form-control" id="barcode1" placeholder="Judul Buku">
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
	// $(function(){
	// 	$('#barcode1').keydown(function(e){
	// 		if (e.keyCode==13) {
	// 			e.preventDefault();
	// 		}
	// 	});
	// });
</script>
@endsection