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
					<img src="{{ asset('/admin-assets/foto_buku/'.$buku->foto_buku) }}" alt="">
				</figure>
			</div>
			<div class="column is-7-tablet">
				<div class="columns is-multiline">
					<div class="column is-half-tablet is-half-desktop">
						<ul>
							<div class="wrap-info">
								<p class="title is-6">Judul buku</p>
								<li class="subtitle is-4">{{ $buku->judul_buku }}
								</li>
							</div>
							<div class="wrap-info">
								<p class="title is-6">Nama peminjam</p>
								<li class="subtitle is-4">{{ $siswa->nama_siswa }}</li>
							</div>
							<div class="wrap-info">	
								<p class="title is-6">Nisn</p>
								<li class="subtitle is-4">{{ $siswa->nisn }}</li>
							</div>
						</ul>
					</div>
					<div class="column is-half-tablet is-half-desktop">
						<ul>
							<div class="wrap-info">
								<p class="title is-6">Kelas</p>
								<li class="subtitle is-4">{{ $siswa->kelas }}
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
						      <input type="checkbox" id="pinjam">
						      saya setuju dengan peraturan yang ada
						    </label>
						  </p>
						</div>
						<form action="{{ url('/buku/pinjam',$buku->id_buku) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="buku" value="{{ $buku->id_buku }}">
						<input type="hidden" name="siswa" value="{{ $siswa->id_siswa }}">
						<input type="hidden" name="tanggal_pinjam" value="2019-07-17">
						<input type="hidden" name="tanggal_harus_kembali" value="2019-07-24">
						<div class="field is-grouped">
						  <p class="control">
						    <button type="submit" class="button is-primary" disabled>Pinjam</button>
						  </p>
						</form>
						  <p class="control">
						  <a href="{{ url('/buku') }}">
						    <button type="button" class="button is-default">Kembali</button>
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
  if ($('#pinjam').is(':checked')) {
  	$('button[type="submit"]').attr('disabled',false);
  }
  $('#pinjam').on('click',function(){
  	if ($(this).is(':checked')) {
  		$('button[type="submit"]').attr('disabled',false);
  		// alert('test');
  	}
  	else {
  		$('button[type="submit"]').attr('disabled',true);	
  	}
  });
});
</script>
@endsection