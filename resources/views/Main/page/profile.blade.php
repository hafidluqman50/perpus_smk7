@extends('Main.layout.layout-app')
@section('title') Profile @endsection
@section('content')
@include('Main.layout.notif-bubble')
<a href="{{ url('/') }}" class="back-menu"><i class="fa fa-arrow-circle-left fa-lg"></i> Kembali</a>
<div class="banner2"></div>
<section id="profil">
	<figure class="foto-siswa">
		<img src="{{ asset('/admin-assets/profile_siswa/'.$siswa->foto_profile) }}" alt="" draggable="false">
	</figure>
	<div class="container">
			<div class="columns is-multiline data-siswa">
				<div class="column is-10-mobile is-offset-1-mobile is-5-tablet is-offset-1-tablet is-4 is-offset-2-desktop">
					<ul>
						<p class="title is-6">nama </p>
						<li class="subtitle is-4">
						{{ $siswa->nama_siswa }}</li>
						<p class="title is-6">username </p>
						<li class="subtitle is-4">
						{{ $siswa->username }}</li>
						<p class="title is-6">kelas </p>
						<li class="subtitle is-4">
						{{ $siswa->kelas->nama_kelas }}</li>
					</ul>
				</div>
				<div class="column is-10-mobile is-offset-1-mobile is-5-tablet is-4">
					<ul>
						<p class="title is-6">nisn </p>
						<li class="subtitle is-4">
						{{ $siswa->nisn }}</li>
						<p class="title is-6">email </p>
						<li class="subtitle is-4">
						{{ $siswa->email }}</li>
					</ul>
				</div>
				<div class="column is-10-mobile is-offset-1-mobile is-10-tablet is-offset-1-tablet is-offset-2-desktop is-8-desktop">
				<div class="columns is-multiline is-mobile is-tablet">
					<div class="column is-3-tablet is-half-mobile is-2-tablet is-2-desktop">
						<a class="button is-primary" href="{{ url('/sunting-profile',$siswa->username) }}">Sunting
						</a>
					</div>
					<div class="column is-offset-4-tablet is-2-tablet is-4-desktop is-offset-6-desktop">
						<a class="button is-danger" href="{{ url('/logout') }}">
							Logout
						</a>
					</div>
				</div>
				</div>
			</div>
	<br>

	<section id="list-transaksi">
			<p class="title is-4 pinjaman">
				Peminjaman Buku
				<span class="icon is-small">
					<i class="fa fa-chevron-down"></i>
				</span>
			</p>
			<div class="columns is-multiline">
				@foreach ($cek as $value)
				<div class="column is-one-third-tablet is-10-mobile is-offset-1-mobile is-one-quarter-desktop">
					<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="{{ url('/buku/detail',$value->judul_slug) }}">
		    						<img src="{{ $value->foto_buku != NULL ? asset('/admin-assets/foto_buku/'.$value->foto_buku) : asset('/admin-assets/foto_buku/book.png') }}" draggable="false">
		    					</a>
		    					</figure>
		    				</div>
		    				<div class="card-content">
			 					<p class="title is-4">{{ $value->judul_buku }}</p>
									<small>{{ $value->tanggal_upload }} -
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									</small>
				 				<div>
					 				<a class="tag is-danger">{{ $value->nama_kategori }}</a>
					 				<a class="tag is-success">{{ $value->nama_sub }}</a>
				 				</div>
			 				</div>
			 				<div class="content">
			 					<div class="columns is-gapless">
			 						<div class="column is-10">
			 							<a href="{{ url('/buku/detail-pinjam/'.$value->id_detail_transaksi.'/'.Auth::user()->username) }}">
				 							<button class="button {{ $value->status_transaksi == 1 ? 'is-warning' : 'is-danger' }} pinjam">Detail Peminjaman</button>
				 						</a>
			 						</div>
			 						<div class="column is-2">
			 							<button class="button is-inverted is-dark pinjam">
			 								<span class="icon">
			 									<i class="fa fa-heart-o animated pulse"></i>
			 								</span>
			 							</button>
			 						</div>
			 					</div>
			 				</div>
		 				</div>
				</div>
				@endforeach
			</div>
	</section>
	<br>
	<section id="wishlist">
			<p class="title is-4 pinjaman">
				Buku wishlist
				<span class="icon is-small">
					<i class="fa fa-chevron-down"></i>
				</span>
			</p>
			<div class="columns is-multiline">
				<div class="column is-one-third-tablet is-10-mobile is-offset-1-mobile is-one-quarter-desktop">
					<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
		    					</a>
		    					</figure>
		    				</div>
		    				<div class="card-content">
			 					<p class="title is-4">Deadpool corps</p>
									<small>1 Jan 2016 -
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									</small>
				 				<div>
					 				<a class="tag is-danger">blood</a>
					 				<a class="tag is-success">comedy</a>
				 				</div>
			 				</div>
			 				<div class="content">
			 					<div class="columns is-gapless">
			 						<div class="column is-10">
			 							<button class="button is-primary pinjam">Pinjam</button>
			 						</div>
			 						<div class="column is-2">
			 							<button class="button is-inverted is-dark pinjam">
			 								<span class="icon">
			 									<i class="fa fa-heart-o animated pulse"></i>
			 								</span>
			 							</button>
			 						</div>
			 					</div>
			 				</div>
		 				</div>
				</div>
				<div class="column is-one-third-tablet is-10-mobile is-offset-1-mobile is-one-quarter-desktop">
					<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
		    					</a>
		    					</figure>
		    				</div>
		    				<div class="card-content">
			 					<p class="title is-4">Deadpool corps</p>
									<small>1 Jan 2016 -
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									</small>
				 				<div>
					 				<a class="tag is-danger">blood</a>
					 				<a class="tag is-success">comedy</a>
				 				</div>
			 				</div>
			 				<div class="content">
			 					<div class="columns is-gapless">
			 						<div class="column is-10">
			 							<button class="button is-primary pinjam">Pinjam</button>
			 						</div>
			 						<div class="column is-2">
			 							<button class="button is-inverted is-dark pinjam">
			 								<span class="icon">
			 									<i class="fa fa-heart-o animated pulse"></i>
			 								</span>
			 							</button>
			 						</div>
			 					</div>
			 				</div>
		 				</div>
				</div>
				<div class="column is-one-third-tablet is-10-mobile is-offset-1-mobile is-one-quarter-desktop">
					<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
		    					</a>
		    					</figure>
		    				</div>
		    				<div class="card-content">
			 					<p class="title is-4">Deadpool corps</p>
									<small>1 Jan 2016 -
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									</small>
				 				<div>
					 				<a class="tag is-danger">blood</a>
					 				<a class="tag is-success">comedy</a>
				 				</div>
			 				</div>
			 				<div class="content">
			 					<div class="columns is-gapless">
			 						<div class="column is-10">
			 							<button class="button is-primary pinjam">Pinjam</button>
			 						</div>
			 						<div class="column is-2">
			 							<button class="button is-inverted is-dark pinjam">
			 								<span class="icon">
			 									<i class="fa fa-heart-o animated pulse"></i>
			 								</span>
			 							</button>
			 						</div>
			 					</div>
			 				</div>
		 				</div>
				</div>
				<div class="column is-one-third-tablet is-10-mobile is-offset-1-mobile is-one-quarter-desktop">
					<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
		    					</a>
		    					</figure>
		    				</div>
		    				<div class="card-content">
			 					<p class="title is-4">Deadpool corps</p>
									<small>1 Jan 2016 -
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									<span class="icon is-small">
										<i class="fa fa-star-o"></i>
									</span>
									</small>
				 				<div>
					 				<a class="tag is-danger">blood</a>
					 				<a class="tag is-success">comedy</a>
				 				</div>
			 				</div>
			 				<div class="content">
			 					<div class="columns is-gapless">
			 						<div class="column is-10">
			 							<button class="button is-primary pinjam">Pinjam</button>
			 						</div>
			 						<div class="column is-2">
			 							<button class="button is-inverted is-dark pinjam">
			 								<span class="icon">
			 									<i class="fa fa-heart-o animated pulse"></i>
			 								</span>
			 							</button>
			 						</div>
			 					</div>
			 				</div>
		 				</div>
				</div>
			</div>
	</section>
	</div>
</section>
@endsection

@section('script')
<script>
$(function(){
  $('#container').css({
  		'background-color':'#efefef'
	});                      
  $(".star").click(function() {  
    $(this).addClass("active");      
  });
});
</script>
{{-- <script>
$(function(){
  	if (window.location.hash=="#wishlist") {
  		$('html,body').stop().animate({
  			scrollTop:$(window.location.hash).offset().top
  		},1200);
  	}
});
</script> --}}
@endsection