@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Edit Data Sub @endsection
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Edit Data Sub</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="">Kategori</label>
					<select name="kategori" id="" required>
						@foreach()
						<option value="{{}}">{{}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Sub Kategori</label>
					<input type="text" class="form-control" placeholder="Nama Sub Kategori" value="" required>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection