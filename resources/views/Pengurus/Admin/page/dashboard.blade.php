@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Admin @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						Dashboard
					</h3>
				</div>
				<div class="box-body">
				<h1>Selamat Datang {{ Auth::user()->username }}</h1>{{-- 
				<img class="img-responsive" style="width:20%; height:200px;border-radius:100%;" src="{{ asset('petugas_profile/'.$petugas->foto_profile) }}" alt=""> --}}
				</div>
			</div>
		</div>
	</div>
@endsection