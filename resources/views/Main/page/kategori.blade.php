@extends('Main.layout.layout-app')
@section('title') Info Kategori @endsection
@section('content')
	<section id="page-buku" class="container is-fluid">
		<button class="button icon open-menu is-hidden-desktop">
			<i class="fa fa-bars"></i>
		</button>
	@include('Main.layout.sidebar')
	<div class="column is-offset-2-desktop">
				<div class="columns is-multiline is-mobile is-tablet">
					<div class="column is-12-mobile is-12-tablet is-12-desktop banner">
						<section class="hero is-danger">
						  <div class="hero-body">
						  	<div class="columns is-multiline is-mobile is-tablet">
						  		<div class="column is-4-desktop books is-hidden-touch">
						  			<figure>
						  				<img draggable="false" src="{{asset('/front-assets/img/buku6.jpg')}}" alt="">
						  			</figure>
						  			<figure>
						  				<img draggable="false" src="{{asset('/front-assets/img/buku5.jpg')}}" alt="">
						  			</figure>
						  			<figure>
						  				<img draggable="false" src="{{asset('/front-assets/img/buku4.jpg')}}" alt="">
						  			</figure>
						  			<figure>
						  				<img draggable="false" src="{{asset('/front-assets/img/buku3.jpg')}}" alt="">
						  			</figure>
						  		</div>
						  		<div class="column">
							  		<h4 class="title is-4">
							  			Refrensi
							  		</h4>
							  		<p class="subtitle is-6">
							  		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem ipsam ad tempore totam eum id, sed distinctio soluta provident facere, natus, sint blanditiis quod sapiente consequatur perferendis perspiciatis debitis! Similique.
							  		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem ipsam ad tempore totam eum id, sed distinctio soluta provident facere, natus, sint blanditiis quod sapiente consequatur perferendis perspiciatis debitis! Similique.
							  		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem ipsam ad tempore totam eum id, sed distinctio soluta provident facere, natus, sint blanditiis quod sapiente consequatur perferendis perspiciatis debitis! Similique.
							  		</p>
							  		<p>total buku : <b>20</b></p>
						  		</div>
						  	</div>
						  </div>
						</section>
					</div>
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="#">
		    						<img src="{{asset('/front-assets/img/buku6.jpg')}}" draggable="false">
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
					<span class="icon is-large load-icon">
						<i class="fa fa-circle-o-notch fa-spin"></i>
					</span>
				</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
$(function(){
  	$('#container').css({
  		'background-color':'#f5f5f5'
	});
});
</script>
@endsection