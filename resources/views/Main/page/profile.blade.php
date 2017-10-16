@extends('Main.layout.layout-app')
@section('title') Profile @endsection
@section('content')
<div class="banner2"></div>
<section id="profil">
			<figure class="foto-siswa">
				<img src="{{ asset('/admin-assets/profile_siswa/'.$siswa->foto_profile) }}" alt="">
			</figure>
	<div class="container">
			<div class="columns is-multiline data-siswa">
				<div class="column is-10-mobile is-offset-1-mobile is-5-tablet is-offset-1-tablet is-4 is-offset-2-desktop">
					<ul>
						<p class="title is-6">nama </p>
						<li class="subtitle is-4">
						<span class="icon is-small">
							<i class="fa fa-chevron-up"></i>	
						</span>
						{{ $siswa->nama_siswa }}</li>
						<p class="title is-6">username </p>
						<li class="subtitle is-4">
						<span class="icon is-small">
							<i class="fa fa-chevron-up"></i>	
						</span>
						{{ $siswa->username }}</li>
						<p class="title is-6">kelas </p>
						<li class="subtitle is-4">
						<span class="icon is-small">
							<i class="fa fa-chevron-up"></i>	
						</span>
						{{ $siswa->kelas }}</li>
					</ul>
				</div>
				<div class="column is-10-mobile is-offset-1-mobile is-5-tablet is-4">
					<ul>
						<p class="title is-6">nisn </p>
						<li class="subtitle is-4">
						<span class="icon is-small">
							<i class="fa fa-chevron-up"></i>	
						</span>
						{{ $siswa->nisn }}</li>
						<p class="title is-6">email </p>
						<li class="subtitle is-4">
						<span class="icon is-small">
							<i class="fa fa-chevron-up"></i>	
						</span>
						{{ $siswa->email }}</li>
					</ul>
				</div>
				<div class="column is-10-mobile is-offset-1-mobile is-5-tablet is-offset-1-tablet is-offset-2-desktop">
					<a class="button is-primary" href="{{ url('/sunting-profile',$siswa->username) }}">Sunting</a>
				</div>
			</div>
	<br>
			<p class="title is-4 pinjaman">
				Rating buku
				<span class="icon is-small">
					<i class="fa fa-chevron-down"></i>
				</span>
			</p>
				<div class="columns is-multiline is-tablet is-mobile" id="rating">
					<div class="column is-10-mobile is-offset-1-mobile is-10-tablet is-offset-1-tablet is-6-desktop is-offset-0-desktop book-rate">
						<div class="columns is-multiline">
								<div class="column is-half">
				    					<figure class="image">
				    					<a href="#">
				    						<img src="{{ asset('/front-assets/img/buku4.jpg') }}" draggable="false">
				    					</a>
				    					</figure>
				    			</div>
								<div class="column is-half">
									<b>X-MEN dan kawan kawan</b>
									<span class="tag is-danger">blood</span>
									<span class="tag is-primary">fantasy</span>
									<p>tanggal pengembalian 30 jul 2012</p>
									<br>
									<span class="stars">
										<span class="star"></span>
										<span class="star"></span>
										<span class="star"></span>
										<span class="star"></span>
										<span class="star"></span>
									</span>
							</div>
						</div>
					</div>
					<div class="column is-10-mobile is-offset-1-mobile is-10-tablet is-offset-1-tablet is-6-desktop is-offset-0-desktop book-rate">
						<div class="columns is-multiline">
							<div class="column is-half">
			    					<figure class="image">
			    					<a href="#">
			    						<img src="{{ asset('/front-assets/img/buku4.jpg') }}" draggable="false">
			    					</a>
			    					</figure>
			    			</div>
							<div class="column is-half">
								<b>X-MEN dan kawan kawan</b>
								<span class="tag is-danger">blood</span>
								<span class="tag is-primary">fantasy</span>
								<p>tanggal pengembalian 30 jul 2012</p>
								<br>
								
									<span class="stars">
										<span class="star"></span>
										<span class="star"></span>
										<span class="star"></span>
										<span class="star"></span>
										<span class="star"></span>
									</span>
							</div>
						</div>
					</div>
				</div>
	<br>
			<p class="title is-4 pinjaman">
				Buku yang dipinjam
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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
			 							<button class="button is-inverted is-dark pinjam" id="notif-wishlist">
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