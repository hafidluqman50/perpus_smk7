@extends('Main.layout.layout-app')
@section('title') Home Page @endsection
@section('content')
<!-- NAVBAR -->
<nav class="navbar" id="nav">
  <div class="navbar-brand">
  	<a href="#" class="navbar-item brands">
  		<img src="{{ asset('/front-assets/img/logo.png') }}" alt="">
  	</a>
    <div class="navbar-burger burger" data-target="navMenuExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <ul id="navMenuExample" class="navbar-menu columns is-multiline is-mobile is-tablet">
		<div class="column is-4-tablet is-12-mobile is-5-desktop">
			<div class="columns is-multiline is-mobile is-tablet">
				<div class="column is-12-mobile is-half-tablet is-offset-half-desktop is-one-quarter-desktop">
				<li><a href="#" class="navbar-item menu-1">populer</a></li>
				</div>
				<div class="column is-12-mobile is-half-tablet is-one-quarter-desktop">
				<li><a href="#" class="navbar-item menu-2">baru</a></li>
				</div>
			</div>
		</div>
		<div class="column is-4-tablet is-2-desktop" align="center">
				<li class="logo"><a href="#">perpus7</a></li>
		</div>
		<div class="column is-4-tablet is-12-mobile is-5-desktop">
			<div class="columns is-multiline is-mobile is-tablet">
				<div class="column is-12-mobile is-half-tablet is-one-quarter-desktop">
				<li><a href="#" class="navbar-item menu-3">panduan</a></li>
				</div>
				<div class="column is-12-mobile is-half-tablet is-one-quarter-desktop">
				<li><a href="#" class="navbar-item menu-4">petugas</a></li>
				</div>
			</div>
		</div>
  </ul>
</nav>
<!-- HEADER -->
@if (Auth::check())
<!-- Header -->
<header id="header">
	<figure>
		<img src="{{ asset('/front-assets/img/header.jpg')}}" alt="">
			<div class="layer"></div>
				<figcaption class="has-text-centered">
					<h1>Selamat datang <b>{{ $nama_siswa }}</b></h1>
					<p>Hidupkan perpus kalian ! dan jadilah generasi gemar membaca bersama teman teman.</p>
					<hr color="lightgrey">
					<a href="{{ url('/profile',$siswa->username) }}" class="button is-primary is-outlined">Profil</a>
					<a href="{{ url('/profile/'.$siswa->username.'#wishlist') }}" class="button is-dark is-inverted is-outlined" id="wishlist">Wishlist</a>
					<button class="icon is-large floating">
						<a class="fa fa-angle-down"></a>
					</button>
				</figcaption>
	</figure>
</header>
@else
<!-- Header -->
<header id="header">
	<figure>
		<img src="{{ asset('/front-assets/img/header.jpg') }}" alt="">
			<div class="layer"></div>
			<figcaption class="has-text-centered">
					<h1>Selamat datang di Perpustakaan</h1>
					<p>Hidupkan perpus kalian ! dan jadilah generasi gemar membaca bersama teman teman.</p>
					<hr color="lightgrey">
					<a href="{{ url('/login-form') }}" class="button is-primary is-outlined">Login</a>
					<button class="icon is-large floating">
						<a class="fa fa-angle-down"></a>
					</button>
				</figcaption>
	</figure>
</header>
@endif

<main>
	<div id="content">
	<div id="wrap-notif">
			<div id="wish">
	    		<div class="wish-notif columns is-multiline notification is-default is-mobile is-tablet">
	    			<button class="delete delete-notif"></button>
			        <div class="column is-2-mobile is-2-tablet is-2-desktop">
			          <span class="icon">
			            <i class="fa fa-heart"></i>
			          </span>
			        </div>
			        <div class="column is-10-tablet is-10-mobile is-10-mobile">
			          Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
			        </div>
	      		</div>
	      	</div>
      	</div>
		@if (Auth::check())
		<section id="profil1" class="hero is-medium is-primary is-bold">
			    <div class="container">
			    	<p class="title-style title is-2 has-text-centered">Profil siswa</p>
			    	<div class="columns is-multiline is-tablet is-mobile">
			    		<div class="column is-12-mobile is-one-third-tablet is-one-third-desktop">
							<figure>
								<img src="{{asset('/admin-assets/profile_siswa/'.$siswa->foto_profile)}}" alt="">
							</figure>
			    		</div>
			    		<div class="column is-12-mobile is-one-third-tablet is-one-third-desktop data-siswa">
			    			<ul>
			    			<p class="title is-5">Nama</p>
			    				<li class="subtitle is-4">
									<span class="icon is-small">
										<i class="fa fa-chevron-up"></i>	
									</span>
			    				{{ $siswa->nama_siswa }}</li>
			    			<p class="title is-5">Username</p>
			    				<li class="subtitle is-4">
									<span class="icon is-small">
										<i class="fa fa-chevron-up"></i>	
									</span>
			    				{{ $siswa->username }}</li>
			    			<p class="title is-5">Kelas</p>	
			    				<li class="subtitle is-4">
									<span class="icon is-small">
										<i class="fa fa-chevron-up"></i>	
									</span>
			    				{{ $siswa->kelas }}</li>
			    			</ul>
			    		</div>
			    		<div class="column is-12-mobile is-one-third-tablet is-one-third-desktop data-siswa">
			    			<ul>
			    			<p class="title is-5">Nisn</p>
			    				<li class="subtitle is-4">
									<span class="icon is-small">
										<i class="fa fa-chevron-up"></i>	
									</span>
			    				{{ $siswa->nisn }}</li>
			    			<p class="title is-5">Email</p>
			    				<li class="subtitle is-4">
									<span class="icon is-small">
										<i class="fa fa-chevron-up"></i>	
									</span>
			    				{{ $siswa->email }}</li>
			    			</ul>
			    		</div>
				    	<div class="column is-4-mobile is-offset-6-tablet is-offset-7-desktop">
				    		<a class="button hover is-medium is-primary is-outlined" href="{{ url('/logout') }}">
								Logout
				    		</a>
			    		</div>
			    	</div>
			    </div>
			</section>
		@endif
		<section id="terpopuler" class="hero is-medium is-info is-bold">
			<div class="hero-body">
				<div class="container">
					<div class="columns is-multiline is-tablet is-mobile">
						<div data-aos="fade-right" data-aos-offset="200" class="column is-12-mobile is-12-tablet is-3-desktop">
							<h1 class="title">
								Buku Terpopuler
							</h1>
							<hr>
							<p class="subtitle is-6">
								Beberapa buku dengan rating tertinggi
							</p>
						</div>
			    		<div data-aos="fade-up" data-aos-delay="200" data-aos-offset="200" class="column is-10-mobile is-offset-1-mobile is-3-desktop">
							<div class="card">
			    				<div class="card-image">
			    					<figure class="image is-1by1">
			    					<a href="#">
			    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
			    					</a>
			    					</figure>
			    				</div>
			    				<div class="card-content">
				 					<p class="title is-5">Deadpool corps</p>
									<div>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star-o"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star-o"></i>
										</span>
									</div>
					 				<div>
					 				<a href="{{ url('/kategori') }}" class="tag is-danger">blood</a>
						 				<a class="tag is-success">comedy</a>
					 				</div>
				 				</div>
				 				<div class="content">
				 					<div class="columns is-gapless is-multiline is-mobile">
				 						<div class="column is-10-desktop is-half-mobile">
				 							<button class="button is-primary pinjam">Pinjam</button>
				 						</div>
				 						<div class="column is-2-desktop is-half-mobile">
				 							<button class="button is-inverted is-dark pinjam notif-wishlist">
				 								<span class="icon">
				 									<i class="fa fa-heart-o animated pulse"></i>
				 								</span>
				 							</button>
				 						</div>
				 					</div>
				 				</div>
			 				</div>
			    		</div>
			    		<div data-aos="fade-down" data-aos-delay="400" data-aos-offset="200" class="column is-10-mobile is-offset-1-mobile is-3-desktop">
							<div class="card">
			    				<div class="card-image">
			    					<figure class="image is-1by1">
			    					<a href="#">
			    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
			    					</a>
			    					</figure>
			    				</div>
			    				<div class="card-content">
				 					<p class="title is-5">Deadpool corps</p>
									<div>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star-o"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star-o"></i>
										</span>
									</div>
					 				<div>
					 				<a href="{{ url('/kategori') }}" class="tag is-danger">blood</a>
						 				<a class="tag is-success">comedy</a>
					 				</div>
				 				</div>
				 				<div class="content">
				 					<div class="columns is-gapless is-multiline is-mobile">
				 						<div class="column is-10-desktop is-half-mobile">
				 							<button class="button is-primary pinjam">Pinjam</button>
				 						</div>
				 						<div class="column is-2-desktop is-half-mobile">
				 							<button class="button is-inverted is-dark pinjam notif-wishlist">
				 								<span class="icon">
				 									<i class="fa fa-heart-o animated pulse"></i>
				 								</span>
				 							</button>
				 						</div>
				 					</div>
				 				</div>
			 				</div>
			    		</div>
			    		<div data-aos="fade-left" data-aos-delay="600" data-aos-offset="200" class="column is-10-mobile is-offset-1-mobile is-3-desktop">
							<div class="card">
			    				<div class="card-image">
			    					<figure class="image is-1by1">
			    					<a href="#">
			    						<img src="{{ asset('/front-assets/img/buku6.jpg') }}" draggable="false">
			    					</a>
			    					</figure>
			    				</div>
			    				<div class="card-content">
				 					<p class="title is-5">Deadpool corps</p>
									<div>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star-o"></i>
										</span>
										<span class="icon">
											<i class="fa fa-star-o"></i>
										</span>
									</div>
					 				<div>
						 				<a class="tag is-danger">blood</a>
						 				<a class="tag is-success">comedy</a>
					 				</div>
				 				</div>
				 				<div class="content">
				 					<div class="columns is-gapless is-multiline is-mobile">
				 						<div class="column is-10-desktop is-half-mobile">
				 							<button class="button is-primary pinjam">Pinjam</button>
				 						</div>
				 						<div class="column is-2-desktop is-half-mobile">
				 							<button class="button is-inverted is-dark pinjam notif-wishlist">
				 								<span class="icon">
				 									<i class="fa fa-heart-o animated pulse"></i>
				 								</span>
				 							</button>
				 						</div>
				 					</div>
				 				</div>
			 				</div>
			    		</div>
			 			<div data-aos="fade-left" data-aos-offset="-100" class="column is-12">
			 				<p class="title is-4 has-text-centered">
			 					<a href="{{ url('/buku') }}">Buku Lainnya</a>
			 					<span class="icon">
			 						<i class="fa fa-angle-double-right"></i>
			 					</span>
			 				</p>
			 			</div>
					</div>
				</div>
			</div>
		</section>
		<section id="terbaru" class="hero is-medium is-success is-bold">
			<div class="hero-body">
				<div class="container">
					<div class="columns is-multiline is-tablet is-mobile">
						<div data-aos="fade-right" data-aos-delay="100" data-aos-offset="200" class="column is-12-mobile is-12-tablet is-hidden-desktop">
							<h1 class="title">
								Buku Terbaru
							</h1>
							<hr>
							<p class="subtitle is-6">
								Beberapa buku dengan baru yg telah ditambah
							</p>
						</div>
			    		<div data-aos="fade-up" data-aos-delay="200" data-aos-offset="200" class="column is-10-mobile is-offset-1-mobile is-3-desktop">
			    			<div class="card">
			    				<div class="card-image">
			    					<figure class="image is-1by1">
			    						<img src="{{ asset('/front-assets/img/buku.jpg') }}">
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
						 				<a class="tag is-warning">comedy</a>
					 				</div>
				 				</div>
				 				<div class="content">
				 					<div class="columns is-gapless">
				 						<div class="column is-10">
				 							<button class="button is-primary pinjam">Pinjam</button>
				 						</div>
				 						<div class="column is-2">
				 							<button class="button is-inverted is-dark pinjam notif-wishlist">
				 								<span class="icon">
				 									<i class="fa fa-heart-o animated pulse"></i>
				 								</span>
				 							</button>
				 						</div>
				 					</div>
				 				</div>
			 				</div>
			    		</div>
			    		<div data-aos="fade-down" data-aos-delay="300" data-aos-offset="200" class="column is-10-mobile is-offset-1-mobile is-3-desktop">
			    			<div class="card">
			    				<div class="card-image">
			    					<figure class="image is-1by1">
			    						<img src="{{ asset('/front-assets/img/buku.jpg') }}">
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
						 				<a class="tag is-warning">comedy</a>
					 				</div>
				 				</div>
				 				<div class="content">
				 					<div class="columns is-gapless">
				 						<div class="column is-10">
				 							<button class="button is-primary pinjam">Pinjam</button>
				 						</div>
				 						<div class="column is-2">
				 							<button class="button is-inverted is-dark pinjam notif-wishlist">
				 								<span class="icon">
				 									<i class="fa fa-heart-o animated pulse"></i>
				 								</span>
				 							</button>
				 						</div>
				 					</div>
				 				</div>
			 				</div>
			    		</div>
			    		<div data-aos="fade-left" data-aos-delay="500" data-aos-offset="200" class="column is-10-mobile is-offset-1-mobile is-3-desktop">
			    			<div class="card">
			    				<div class="card-image">
			    					<figure class="image is-1by1">
			    						<img src="{{ asset('/front-assets/img/buku.jpg') }}">
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
						 				<a class="tag is-warning">comedy</a>
					 				</div>
				 				</div>
				 				<div class="content">
				 					<div class="columns is-gapless">
				 						<div class="column is-10">
				 							<button class="button is-primary pinjam">Pinjam</button>
				 						</div>
				 						<div class="column is-2">
				 							<button class="button is-inverted is-dark pinjam notif-wishlist">
				 								<span class="icon">
				 									<i class="fa fa-heart-o animated pulse"></i>
				 								</span>
				 							</button>
				 						</div>
				 					</div>
				 				</div>
			 				</div>
			    		</div>
						<div data-aos="fade-up" data-aos-delay="700" data-aos-offset="200" class="column is-hidden-mobile is-hidden-tablet-only is-block-desktop is-3-desktop">
							<h1 class="title">
								Buku Terbaru
							</h1>
							<hr>
							<p class="subtitle is-6">
								Beberapa buku dengan baru yg telah ditambah
							</p>
						</div>
			 			<div data-aos="fade-up" data-aos-offset="-100" class="column is-12">
			 				<p class="title is-4 has-text-centered">
			 					<a href="#">Buku Lainnya</a>
			 					<span class="icon">
			 						<i class="fa fa-angle-double-right"></i>
			 					</span>
			 				</p>
			 			</div>
					</div>
				</div>
			</div>
		</section>
		<section id="panduan" class="hero is-medium is-warning is-bold">
		  <div class="hero-body">
		    <div class="container">
				<div data-aos="fade-down" data-aos-delay="100" data-aos-offset="200" class="has-text-centered">
				      <h1 class="title">
				      	Panduan Perpustakaan
				      </h1>
				      <p class="subtitle is-6" color="white">
				       	Ikuti semua cara dengan langkah per langkah agar mudah dalam peminjaman
				      </p>
				</div>
				<div data-aos="fade-up" data-aos-delay="400" data-aos-offset="200" class="center-slide">
          			<div>
          				<img src="{{ asset('/front-assets/img/buku.jpg') }}">
          				<h5 class="title is-5">Langkah 1</h5>
          				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quibusdam maxime hic possimus, quaerat odi.</p>
          			</div>
          			<div>
          				<img src="{{ asset('/front-assets/img/buku2.jpg') }}">
          				<h5 class="title is-5">Langkah 2</h5>
          				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quibusdam maxime hic possimus, quaerat d.</p>
          			</div>
          			<div>
          				<img src="{{ asset('/front-assets/img/buku3.jpg') }}">
          				<h5 class="title is-5">Langkah 3</h5>
          				<p class="subtitle">Lorem ipsum abore, deserunt rem optio amet accusamus eum quod sunt odit facilis quas architecto expedita sed.</p>
          			</div>
          			<div>
          				<img src="{{ asset('/front-assets/img/buku4.jpg') }}">
          				<h5 class="title is-5">Langkah 4</h5>
          				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quibusdam maxime hic possimus, quaed.</p>
          			</div>
          			<div>
          				<img src="{{ asset('/front-assets/img/buku5.jpg') }}">
          				<h5 class="title is-5">Langkah 5</h5>
          				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipt facilis quas architecto expedita sed.</p>
          			</div>
          			<div>
          				<img src="{{ asset('/front-assets/img/buku6.jpg') }}">
          				<h5 class="title is-5">Langkah 6</h5>
          				<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quibusdam maxime hic possimus, quaerat d.</p>
          			</div>
				</div>
		    </div>
		  </div>
		</section>
		<section id="petugas" class="hero is-medium is-danger is-bold">
		  <div class="hero-body">
		    <div class="container">
		    	<div class="columns is-multiline is-tablet is-mobile">
		    		<div data-aos="fade-up" data-aos-delay="200" data-aos-offset="200"  class="column is-hidden-desktop is-12-mobile is-12-tablet has-text-centered">
		    			<div>
			    			  <h1 class="title">
					      	  Petugas Perpustakaan
					      	  </h1>
					      <hr>
						      <p class="subtitle is-6">
						       	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						      </p>
					     </div>
		    		</div>
		    		<div data-aos="fade-right" data-aos-delay="300" data-aos-offset="200" class="column is-12-mobile is-half-tablet is-4-desktop">
    					<figure class="image">
    						<img src="{{ asset('/front-assets/img/petugas.jpg') }}">
    						<figcaption>
    							<p class="title is-5">Wulandary widyodiningrat s.kom</p>
    							<p class="subtitle is-6">00292394245</p>
    						</figcaption>
    					</figure>
		    		</div>
		    		<div data-aos="fade-down" data-aos-delay="200" data-aos-offset="200" class="column is-4-desktop is-hidden-mobile is-hidden-tablet-only has-text-centered">
		    			<div>
			    			  <h1 class="title">
					      	  Petugas Perpustakaan
					      	  </h1>
					      <hr>
						      <p class="subtitle is-6">
						       	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						      </p>
					     </div>
		    		</div>
		    		<div data-aos="fade-left" data-aos-delay="300" data-aos-offset="200" class="column is-12-mobile is-half-tablet is-4-desktop">
    					<figure class="image">
    						<img src="{{ asset('/front-assets/img/petugas2.jpg') }}">
    						<figcaption>
    							<p class="title is-5">Muhammad Jagaw hermanysah, S.Pd</p>
    							<p class="subtitle is-6">00292394245</p>
    						</figcaption>
    					</figure>
		    		</div>
		    	</div>
		    </div>
		  </div>
		</section>
	</div>
</main>
@include('Main.layout.footer-link')
@endsection

@section('script')
    @if (Auth::check())
    <script>
    $("button.floating").click(function() {
    $('html,body').animate({
        scrollTop: $("#profil1").offset().top},
        1000);
	 });
    </script>
    @else
    <script>
    $("button.floating").click(function() {
    $('html,body').animate({
        scrollTop: $("#terpopuler").offset().top},
        1000);
	 });
    </script>
    @endif
    <script>
    $("a.menu-1").click(function() {
    $('html,body').animate({
        scrollTop: $("#terpopuler").offset().top},
        1200);
	 });
    $("a.menu-2").click(function() {
    $('html,body').animate({
        scrollTop: $("#terbaru").offset().top},
        1100);
	 });
    $("a.menu-3").click(function() {
    $('html,body').animate({
        scrollTop: $("#panduan").offset().top},
        1000);
	 });
    $("a.menu-4").click(function() {
    $('html,body').animate({
        scrollTop: $("#petugas").offset().top},
        900);
	 });
    </script>
@endsection