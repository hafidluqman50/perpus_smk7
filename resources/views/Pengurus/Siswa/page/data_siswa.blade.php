@extends('Pengurus.layout.layout-app')
@section('title') Data Siswa @endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<p class="box-title">
						Data Siswa
					</p>
				</div>
				<div class="box-body">
					<table id="buku" class="table table-hover table-bordered dt-responsive">
						<thead>
							<th>No.</th>
							<th>Judul Buku</th>
							<th>Kategori</th>
							<th>Penerbit</th>
							<th>Tahun Terbit</th>
							<th>Stok Buku</th>
							<th>Action</th>
						</thead>
						<tbody>
						@foreach ($bukus as $no => $buku)
							<tr>
								<td>{{ $no+1 }}</td>
								<td>{{ $buku->judul_buku }}</td>
								<td>{{ $buku->kategori->nama_kategori }}</td>
								<td>{{ $buku->penerbit }}</td>
								<td>{{ $buku->tahun_terbit }}</td>
								<td>@if ($buku->stok_buku==0)
								<small class="label bg-red">
								{{ $buku->stok_buku }}
								</small>
								@else
								<small class="label bg-green">
								{{ $buku->stok_buku }}
								</small>
								@endif</td>
								<td>
								@if (Auth::user()->level==1)
									<button class="btn btn-danger user">
										Non-Aktif
									</button>
									<a href="{{ url('/petugas/detail-buku',$buku->id_buku) }}">
										<button class="btn btn-success">
											Detail
										</button>
									</a>
								@elseif(Auth::user()->level==2)
									<button class="btn btn-danger user">
										Non-Aktif
									</button>
									<a href="{{ url('/admin/detail-buku',$buku->id_buku) }}">
										<button class="btn btn-success">
											Detail Siswa
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