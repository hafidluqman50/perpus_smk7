<div class="columns is-multiline is-mobile">
		<div class="column is-3-mobile is-3-desktop is-fixed" id="side-menu">
		<button class="delete close-menu" onclick="closeMenu()"></button>
		<aside class="menu">
			<div class="back-button">
			  <a href="{{ url('/') }}"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
			</div>
			<div class="search-button">
				  <p class="menu-label">
						<span class=ticon is-small">
							<i class="fa fa-search"></i>
						</span>
				    Cari buku
				  </p>
				  <ul class="menu-list">
				  	<div class="field">
						<input class="input" type="text" placeholder="Judul buku">
						{{-- <button></button> --}}
					</div>
				  </ul>
			</div>
			<div class="sort-button">
				  <p class="menu-label">
						<span class="icon is-small">
							<i class="fa fa-sort"></i>
						</span>
				    Urut berdasarkan
				  </p>
				  <div class="menu-list">
					<div class="field">
					  <p class="control">
					    <span class="select">
					      <select>
					        <option>buku terbaru</option>
					        <option>buku terpopuler</option>
					        <option>buku terbanyak</option>	
					        <option>buku lama</option>
					      </select>
					    </span>
					  </p>
					</div>
				  </div>
			</div>
			<div class="categori-button">
			  <p class="menu-label">
					<span class="icon is-small">
						<i class="fa fa-book"></i>
					</span>
			    kategori buku
			  </p>
			</div>
			  <ul class="menu-list kategori">
			    <li><a href="{{ url('/buku') }}">Semua buku</a></li>
			    {{-- <li>
			      <a href="{{ url('/buku/kategori') }}">Refrensi <span class="tag is-primary">300</span></a>
			      <ul>
			        <li>
			        	<a>
			        		Semua
			        		<p>120</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        		rekayasa perangkat lunak
			        		<p>120</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        		multimedia
			        		<p>80</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        		teknik komputer dan jaringan
			        		<p>100</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        		Umum
			        		<p>100</p>
			        	</a>
			        </li>
			      </ul>
			    </li>
			    <li>
			      <a href="{{ url('/buku/kategori') }}">Pelajaran <span class="tag is-primary">280</span></a>
			      <ul>
			        <li>
			        	<a>
			        		Semua
			        		<p>120</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        		mateatika
			        		<p>20</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        	bahasa indonesia
			        		<p>90</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        	bahasa inggris
			        		<p>20</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        	fisika
			        		<p>25</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        	olahraga
			        		<p>35</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        	sejarah indonesia
			        		<p>24</p>
			        	</a>
			        </li>
			        <li>
			        	<a>
			        	agama
			        		<p>40</p>
			        	</a>
			        </li>
			      </ul>
			    </li>
			    <li>
			      <a>Novel <span class="tag is-primary">50</span></a>
			    </li>
			    <li>
			      <a>Fiksi <span class="tag is-primary">80</span></a>
			    </li>
			    <li>
			      <a>Non-Fiksi <span class="tag is-primary">100</span></a>
			    </li> --}}
			    @foreach ($kategoris as $kategori)
			    <li>
			    	<a href="{{ url('/buku/kategori',$kategori->slug_kategori) }}">
			    		{{ $kategori->nama_kategori }} <span class="tag is-primary">{{ $sub_class->num_rows_kategori($kategori->slug_kategori) }}</span>
			    	</a>
					<ul>
						@foreach ($sub_class->get_sub($kategori->id_kategori_buku) as $sub)
						<li>
							<a href="{{ url('/buku/kategori/sub',$sub->slug_sub_ktg) }}">
								{{ $sub->nama_sub }} <span class="tag is-primary">{{ $sub_class->num_rows_sub($sub->slug_sub_ktg) }}</span>
							</a>
						</li>
						@endforeach
					</ul>
			    </li>
			    @endforeach
			  </ul>
		</aside>
	</div>