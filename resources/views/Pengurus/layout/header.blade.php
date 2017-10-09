<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>SMK</b>7</span>
      <span class="logo-lg"><b>Perpus</b> SMKN7</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              {{-- <span class="label label-warning">10</span> --}}
            </a>
            <ul class="dropdown-menu">
              
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if (Auth::user()->level==1)
              <img src="{{ asset('/admin-assets/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">Petugas Perpustakaan</span>
            @elseif(Auth::user()->level==2)
              <img src="{{ asset('/admin-assets/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin Perpustakaan</span>
            @endif
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ asset('/admin-assets/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/profile',auth()->user()->username) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/admin-assets/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        {{-- Petugas --}}
        @if (Auth::user()->level==1)
          <p>Petugas Perpustakaan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ url('/dashboard-petugas') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          </li>
        <li>
          <a href="{{ url('/petugas/data-siswa') }}">
            <i class="fa fa-graduation-cap"></i>
            <span>Siswa</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/petugas/data-barcode') }}">
            <i class="fa fa-qrcode"></i> <span>Barcode</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/petugas/data-buku') }}"><i class="fa fa-circle-o"></i> 
            Data Buku</a></li>
            <li><a href="{{ url('/petugas/data-peminjaman') }}"><i class="fa fa-circle-o"></i> Data Peminjaman</a></li>
            <li><a href="{{ url('/petugas/data-pengembalian') }}"><i class="fa fa-circle-o"></i> Data Pengembalian</a></li>
          </ul>
        </li>
      </ul>
      {{-- End Petugas --}}

      {{-- Admin --}}
      @elseif (Auth::user()->level==2)
          <p>Admin Perpustakaan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ url('/dashboard-admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          </li>
        <li>
          <a href="{{ url('/admin/data-petugas') }}">
            <i class="fa fa-users"></i> <span>Petugas</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/data-siswa') }}">
            <i class="fa fa-graduation-cap"></i>
            <span>Siswa</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/admin/data-barcode') }}">
            <i class="fa fa-qrcode"></i> <span>Barcode</span>
          </a>
        </li>
        <li>
        	<a href="{{ url('/admin/data-catat-transaksi') }}">
        		<i class="fa fa-history"></i> <span>Catatan Transaksi</span>
        	</a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/data-buku') }}"><i class="fa fa-circle-o"></i> 
            Data Buku</a></li>
            <li><a href="{{ url('/admin/data-sub-kategori') }}"><i class="fa fa-circle-o"></i> Data Sub Kategori Buku</a></li>
            <li><a href="{{ url('/admin/data-kategori') }}"><i class="fa fa-circle-o"></i> Data Kategori Buku</a></li>
            <li><a href="{{ url('/admin/data-peminjaman') }}"><i class="fa fa-circle-o"></i> Data Peminjaman</a></li>
            <li><a href="{{ url('/admin/data-pengembalian') }}"><i class="fa fa-circle-o"></i> Data Pengembalian</a></li>
          </ul>
        </li>
      </ul>
      {{-- End Admin --}}
          @endif
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
    <h1>
      Administrator Perpustakaan
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">