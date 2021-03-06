@extends('Main.layout.layout-app')
@section('title') Info Buku @endsection
@section('content')
	<section id="info-buku">
	<div class="container">
		<div class="columns is-multiline is-mobile">
			<div class="column is-offset-1-mobile is-10-mobile is-6-tablet is-5-desktop">
				<figure class="image kandang">
					<div class="kubik">
						<figure>
							<div class="left">
								<p>inhumans Vs X-Men</p>
							</div>
						</figure>
						<img class="front" src="{{asset('/front-assets/img/buku5.jpg')}}" alt="">
					</div>
				</figure>
			</div>
			<div class="column is-offset-1-mobile is-6-tablet is-10-mobile">
				<h3 class="title is-3">inhumans vs x-men</h3>
				<p class="subtitle is-6">Lorem ipsum dolor</p>
				<div class="columns data-buku">
					<div class="column">
						<ul>
							<div class="wrap-info">
								<p class="title is-5">penerbit</p>
								<li class="subtitle">gramedia</li>
							</div>
							<div class="wrap-info">
								<p class="title is-5">tahun terbit</p>
								<li class="subtitle">2017</li>
							</div>
							<div class="wrap-info">
								<p class="title is-5">stok</p>
								<li class="subtitle">20</li>
							</div>
						</ul>
					</div>
					<div class="column">
						<ul>
							<div class="wrap-info">
								<p class="title is-5">publish</p>
								<li class="subtitle">30 juli 2017</li>
							</div>
							<div class="wrap-info">
								<p class="title is-5">kategori</p>
								<li class="subtitle">
							<a href="#">
							<span class="tag is-warning">blood</span>
							</a>
							<a href="#">
							<span class="tag is-info">horror</span>
							</a>
							</li>
							</div>
							<div class="wrap-info">
							<p class="title is-5">rating</p>
							<li class="subtitle">
									<span class="icon rate">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon rate">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon rate">
										<i class="fa fa-star"></i>
									</span>
									<span class="icon rate">
										<i class="fa fa-star-o"></i>
									</span>
									<span class="icon rate">
										<i class="fa fa-star-o"></i>
									</span>
							</li>
							</div>
						</ul>
					</div>
				</div>
				<div class="columns is-mobile is-tablet is-multiline">
					<div class="column is-half-mobile is-half-tablet is-4-desktop">
						<button class="button is-primary pinjam" href="#">Pinjam</button>
					</div>
					<div class="column is-half-mobile is-half-tablet is-4-desktop">
			 			<button class="button is-dark is-outlined pinjam">
			 				<p>Wishlist</p>
			 				<span class="icon is-small">
			 					<i class="fa fa-heart-o"></i>
			 				</span>
			 			</button>
			 		</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
  $('#container').css({
  	'background-size':'cover',
  	'background-image':'url(/front-assets/img/pattern.png)',
    'background-image': 'linear-gradient(to right, rgba(20,30,48,0.95) 0%, rgba(36, 59, 85, 0.95) 100%), url(/front-assets/img/pattern.png)'
});
</script>
@endsection