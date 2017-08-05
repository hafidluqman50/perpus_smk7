@extends('Main.layout.layout-app')
@section('title') Buku @endsection
@section('content')
<section id="page-buku" class="container is-fluid">
	<div id="wrap-notif">
		<div id="borrow">
			<div class="columns is-multiline notification is-default is-mobile is-tablet">
				<button class="delete delete-notif"></button>
		        <div class="column is-2-mobile is-2-tablet is-2-desktop">
		          <span class="icon">
		            <i class="fa fa-ban"></i>
		          </span>
		        </div>
		        <div class="column is-borrow is-10-tablet is-10-mobile is-10-mobile">
		        	Tidak Bisa Meminjam Buku
		        </div>
			</div>
		</div>
		<div id="wish">
			<div class="wish-notif columns is-multiline notification is-default is-mobile is-tablet">
				<button class="delete delete-notif"></button>
		        <div class="column is-2-mobile is-2-tablet is-2-desktop">
		          <span class="icon">
		            <i class="fa fa-heart"></i>
		          </span>
		        </div>
		        <div class="column is-10-tablet is-10-mobile is-10-mobile">
		        Buku Ditambahkan Ke wishlist 
		        </div>
	  		</div>
	  	</div>
	</div>
		<button class="button icon is-medium open-menu is-hidden-desktop">
			<i class="fa fa-bars"></i>
		</button>
	<div class="columns is-multiline is-mobile">
		@include('Main.layout.sidebar')
		<div class="column is-offset-2-desktop">
		@if (session()->has('success'))
		 <div class="notification is-primary" id="show">
    		<button class="delete" id="remove"></button>
	        <div class="column is-10-tablet is-10-mobile is-10-mobile">
	        {{ session('success') }}
	        </div>
	      </div>
	     @elseif(session()->has('log'))

		 <div class="notification is-danger" id="show">
    		<button class="delete" id="remove"></button>
	        <div class="column is-10-tablet is-10-mobile is-10-mobile">
	        {{ session('log') }}
	        </div>
	      </div>
		@endif
				<div class="columns is-multiline is-mobile">
				@foreach ($bukus as $buku)
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
						<div class="card">
		    				<div class="card-image">
		    					<figure class="image is-1by1">
		    					<a href="{{ url('/buku/detail',$buku->judul_slug) }}">
		    						<img src="{{ asset('/admin-assets/foto_buku/'.$buku->foto_buku) }}" draggable="false">
		    					</a>
		    					</figure>
		    				</div>
		    				<div class="card-content">
		    				<a href="{{ url('/buku/detail',$buku->judul_slug) }}">
			 					<p class="title is-5">{{ $buku->judul_buku }}</p>
		    				</a>
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
			 						@if (Auth::check())
				 						@if ($transaksi == null)
				 						<a href="{{ url('/buku/pinjam',$buku->judul_slug) }}">
				 							<button class="button is-primary pinjam">
				 								Pinjam
				 							</button>
				 						</a>
				 						@else
				 						<a href="#">
				 							<button class="button is-borrow pinjam">
				 								<s>Pinjam</s>
				 							</button>
				 						</a>
				 						@endif
				 					@else
				 						<a href="{{ url('/buku/pinjam',$buku->judul_slug) }}">
				 							<button class="button is-primary pinjam">
				 								Pinjam
				 							</button>
				 						</a>
			 						@endif
			 						</div>
			 						<div class="column is-2-desktop is-half-mobile">
			 							<button class="button notif-wishlist is-inverted is-dark pinjam">
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
					<div class="column is-10-mobile is-offset-1-mobile is-one-third-tablet is-one-quarter-desktop">
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
			 						<a href="{{ url('/buku/pinjam') }}">
			 							<button class="button is-primary pinjam">Pinjam</button>
			 						</a>
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
										<i class="fa fa-star"></i>
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
	$("button.close-menu, .overlay").click(function(){
        $("#side-menu").css("left", "-300px");
        $('.overlay').fadeOut(200);
    });
    $("button.open-menu").click(function(){
        $("#side-menu").css("left", "0");
        $('.overlay').fadeIn(200);
    });
    $('#remove').on('click',function(){
    	$('#show').hide();
    });
});
</script>
@endsection

{{-- @section('script')
<script>
	function wishtlist(id_buku) {
		$.ajax({
			type:"POST",
			url:"/buku/pinjam/"+id_buku,
			data:
		});
	}
</script>
@endsection --}}