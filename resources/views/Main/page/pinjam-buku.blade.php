@extends('Main.layout.layout-app')
@section('title') Pinjam Buku @endsection
@section('content')
<section id="info-peminjaman">
	<div class="container">
		<div class="columns is-multiline is-tablet is-mobile">
			<div class="column is-12-desktop is-12-tablet is-12-mobile">
				<p class="title-style has-text-centered title is-2"><b>Info Peminjaman</b></p>
			</div>
			<div class="column is-4-desktop is-5-tablet is-12-mobile data-buku">
				<figure>
					<img src="{{asset('/admin-assets/foto_buku/'.$transaksi->foto_buku)}}" alt="">
				</figure>
			</div>
			<div class="column">
				<div class="columns is-multiline">
					<div class="column is-half data-buku">
					<ul>
						<div class="wrap-info">
							<p class="title is-6">Judul buku</p>
							<li class="subtitle is-4">{{ $transaksi->judul_buku }}</li>
						</div>
						<div class="wrap-info">
							<p class="title is-6">Nama peminjaman</p>
							<li class="subtitle is-4">{{ $transaksi->nama_siswa }}</li>
						</div>
						<div class="wrap-info">
							<p class="title is-6">Nisn</p>
							<li class="subtitle is-4">{{ $transaksi->nisn }}</li>
						</div>
					</ul>
					</div>
					<div class="column is-half data-buku">
						<ul>
							<div class="wrap-info">
								<p class="title is-6">Kelas</p>
								<li class="subtitle is-4">{{ $transaksi->kelas }}</li>
							</div>
							<div class="wrap-info">
								<p class="title is-6">Tanggal peminjaman</p>
								<li class="subtitle is-4">{{ $transaksi->tanggal_pinjam_buku }}</li>
							</div>
							<div class="wrap-info">
								<p class="title is-6">Tanggal Max pengembalian</p>
								<li class="subtitle is-4">{{ $transaksi->tanggal_jatuh_tempo }}</li>
							</div>
						</ul>
					</div>
					<div class="column is-12">
						<div class="field">
							<p class="control">
							<a href="{{ url('/buku') }}">
								<button class="button is-default">Kembali</button>
							</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
$(function(){
	$('#container').css({
	  	'background-color':'#00d1b2'
	});
});
</script>
@endsection