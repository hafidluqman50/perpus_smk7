@extends('Main.layout.layout-app')
@section('title') Transaksi @endsection
@section('content')
<section id="transaksi">
	<div class="container">
		<div class="columns is-multiline data-buku">
			<div class="column is-12-tablet is-12-desktop">
				<p class="title-style has-text-centered title is-2">
					<b>Transaksi Buku</b>
				</p>
			</div>
			<div class="column is-5-tablet is-4-desktop">
				<figure>
					<img src="../img/buku4.jpg" alt="">
				</figure>
			</div>
			<div class="column is-7-tablet">
				<div class="columns is-multiline">
					<div class="column is-half-tablet is-half-desktop">
						<ul>
							<div class="wrap-info">
								<p class="title is-6">Judul buku</p>
								<li class="subtitle is-4">The lorem and The ipsum
								</li>
							</div>
							<div class="wrap-info">
								<p class="title is-6">Nama peminjam</p>
								<li class="subtitle is-4">Muhammad Ilham</li>
							</div>
							<div class="wrap-info">	
								<p class="title is-6">Nisn</p>
								<li class="subtitle is-4">002342942</li>
							</div>
						</ul>
					</div>
					<div class="column is-half-tablet is-half-desktop">
						<ul>
							<div class="wrap-info">
								<p class="title is-6">Kelas</p>
								<li class="subtitle is-4">XII RPL 2
								</li>
							</div>
							<div class="wrap-info">
								<p class="title is-6">Tanggal Peminjaman</p>
								<li class="subtitle is-4">17 Jul 2019</li>
							</div>
							<div class="wrap-info">	
								<p class="title is-6">Tanggal Max pengembalian</p>
								<li class="subtitle is-4">19 Jan 2020</li>
							</div>
						</ul>
					</div>
					<div class="column is-12-tablet is-12-desktop">
						<div class="aturan">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic mollitia quos non nostrum et excepturi laboriosam explicabo magni, provident praesentium minus accusantium, odit, natus officia autem possimus eius velit atque.
						</div>
						<div class="field">
						  <p class="control">
						    <label class="checkbox">
						      <input type="checkbox">
						      saya setuju dengan peraturan yang ada
						    </label>
						  </p>
						</div>
						<div class="field is-grouped">
						  <p class="control">
						    <button class="button is-primary">Pinjam</button>
						  </p>
						  <p class="control">
						    <button class="button is-default">Kembali</button>
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
  $('#container').css({
  	'background-color':'#00d1b2'
	});
</script>
@endsection