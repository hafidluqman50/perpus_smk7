@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Data Sub Kategori @endsection
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<p class="box-title">
					Data Sub Kategori
				</p>
				<br/>
				<br/>
				<a href="{{ url('/admin/tambah-data-sub') }}">
					<button class="btn btn-primary">
						Tambah
					</button>
				</a>
			</div>
			<div class="box-body">
				<table class="table table-hover table-bordered dt-responsive buku">
					<thead>
						<th>No.</th>
						<th>Nama Kategori</th>
						<th>Nama Sub Kategori</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($sub as $no => $data)
						<tr>
							<td>{{ $no+1 }}</td>
							<td>{{ $data->kategori->nama_kategori }}</td>
							<td>{{ $data->nama_sub }}</td>
							<td>
								<a href="{{ url('/admin/edit-data-sub',$data->id_sub_ktg) }}">
									<button class="btn btn-warning">
										Edit
									</button>
								</a>
								<a href="{{ url('/admin/delete-data-sub',$data->id_sub_ktg) }}">
									<button class="btn btn-danger">
										Hapus
									</button>
								</a>
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