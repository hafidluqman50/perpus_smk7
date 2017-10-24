@extends('Main.layout.layout-app')
@section('title') Buku @endsection
@section('content')
	<div id="wrap-badges">
		<button id="badges" class="btn-drop">
			<i class="fa fa-bell-o fa-2x animated ringdong"></i>
			<p>20</p>
		</button>
		<ul id="drop-badges" class="drop-menu">
			<li><a href="lol.php">mnu1</a></li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
			<li>mnu2</li>
		</ul>
	</div>
<section id="page-buku" class="container is-fluid">
		<button class="button icon is-medium open-menu is-hidden-desktop">
			<i class="fa fa-bars"></i>
		</button>
	<div class="columns is-multiline is-mobile">
		@include('Main.layout.sidebar')
		<div class="column is-9-desktop is-offset-3-desktop is-centered">
				<div class="columns is-multiline is-mobile">
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{ asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
		</div>
	</div>
</section>
@endsection