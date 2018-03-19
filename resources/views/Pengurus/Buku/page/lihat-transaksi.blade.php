@extends('Pengurus.layout.layout-app')
@section('title') Lihat Transaksi @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						@if(Auth::user()->level==1)
		              <a href="{{ url('/petugas/data-transaksi') }}">
		                <button class="btn btn-primary">
		                  <span class="fa fa-arrow-left"></span> Kembali
		                </button>
		              </a>
		              @elseif(Auth::user()->level==2)
		              <a href="{{ url('/admin/data-transaksi') }}">
		                <button class="btn btn-primary">
		                  <span class="fa fa-arrow-left"></span> Kembali
		                </button>
		              </a>
		              @endif
		              Lihat Transaksi
						<p class="text">
							Nama Siswa : {{ $siswa->nama_siswa }}
						</p>
						<p class="text">
							NISN : {{ $siswa->nisn }}
						</p>
						<p class="text">
							Kelas : {{ $siswa->kelas->nama_kelas }}
						</p>
					</p>
				</div>
				<div class="box-body">
					<table class="table table-hover table-bordered dt-responsive buku">
						<thead>
							<th>No.</th>
							<th>Judul Buku</th>
							<th>Tanggal Pinjam</th>
							<th>Tanggal Harus Kembali</th>
							<th>Tanggal Kembali</th>
							<th>Denda</th>
							<th>Ket.</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($lihat as $no => $data)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $data->judul_buku }}</td>
								<td>{{ $data->tanggal_pinjam_buku }}</td>
								<td>{{ $data->tanggal_jatuh_tempo }}</td>
								<td>{{ $data->tanggal_kembali != NULL ? $data->tanggal_kembali : '-' }}</td>
								<td>{{ $data->denda != NULL ? rupiah($data->denda) : '-' }}</td>
								<td>@if($data->status_transaksi == 0)
									<span class="label label-danger">Batal Pinjam</span>
									@elseif($data->status_transaksi == 1)
									<span class="label label-warning">Pending</span>
									@elseif($data->status_transaksi == 2)
									<span class="label label-info">Dipinjam</span>
									@elseif($data->status_transaksi == 3)
									<span class="label label-success">Kembali</span>
									@elseif($data->status_transaksi == 4)
									<span class="label label-danger">Belum Kembali</span>
								@endif</td>
								<td>
									@if(Auth::user()->level==1)
										<a href="{{ url('/petugas/atur-pinjaman',$data->id_detail_transaksi) }}">
											<button class="btn btn-success" {{ ($data->status_transaksi != 1 ? 'disabled' : '') }}>
												Atur Pinjam
											</button>
										</a>
										<a href="{{ url('/petugas/perpanjang-pinjam',$data->id_detail_transaksi) }}">
											<button class="btn btn-warning">
												Perpanjang Transaksi
											</button>
										</a>
										<a href="{{ url('/petugas/detail-transaksi',$data->id_detail_transaksi) }}">
											<button class="btn btn-primary">
												Detail
											</button>
										</a>
										<a href="{{ url('/delete/petugas/detail-transaksi/'.$data->id_transaksi.'/'.$data->id_detail_transaksi) }}" onclick="return confirm('Yakin Hapus ?');">
											<button class="btn btn-danger">
												Hapus
											</button>
										</a>
									@elseif(Auth::user()->level==2)
										<a href="{{ url('/admin/atur-pinjaman',$data->id_detail_transaksi) }}">
											<button class="btn btn-success" {{ ($data->status_transaksi != 1 ? 'disabled' : '') }}>
												Atur Pinjam
											</button>
										</a>
										<a href="{{ url('/admin/perpanjang-pinjam',$data->id_detail_transaksi) }}">
											<button class="btn btn-warning">
												Perpanjang Transaksi
											</button>
										</a>
										<a href="{{ url('/admin/detail-transaksi',$data->id_detail_transaksi) }}">
											<button class="btn btn-primary">
												Detail
											</button>
										</a>
										<a href="{{ url('/delete/admin/detail-transaksi/'.$data->id_transaksi.'/'.$data->id_detail_transaksi) }}" onclick="return confirm('Yakin Hapus ?');">
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