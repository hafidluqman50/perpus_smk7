@extends('Pengurus.layout.layout-app')
@section('title') Catatan Transaksi @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Catatan Transaksi
					</p>
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Catatan</th>
							<th>Tanggal Catatan</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach($catatan as $num => $catat)
							<tr>
								<td>{{ $num+1 }}</td>
								<td>{{ $catat->text }}</td>
								<td>{{ $catat->tanggal_catat }}</td>
								<td>
									@if(Auth::user()->level==1)
									<a href="{{ url('/delete/petugas/data-catat-transaksi',$catat->id_catat) }}">
										<button class="btn btn-danger">
											Hapus
										</button>
									</a>
									@else
									<a href="{{ url('/delete/admin/data-catat-transaksi',$catat->id_catat) }}">
										<button class="btn btn-danger">
											Hapus
										</button>
									</a>
									@endif
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
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