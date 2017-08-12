@extends('Pengurus.layout.layout-app')
@section('title') Atur Transaksi @endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Data Transaksi</h3>				
			</div>
			<div class="box-body">
				@if ($get_data != null)
					@foreach ($get_data as $transaksi)
						<section id="{{ $transaksi-> }}"></section>
					@endforeach
				@else
				<h3>Tidak Ada Pending Transaksi</h3>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection