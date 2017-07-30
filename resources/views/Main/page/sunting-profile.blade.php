@extends('Main.layout.layout-app')
@section('title') Sunting Profile @endsection
@section('content')
<div class="banner2"></div>
<section id="profil">
    <figure class="foto-siswa">
        <img src="{{ asset('/admin-assets/profile_siswa/'.$siswa->foto_profile) }}" alt="">
    </figure>
    <form action="{{ url('/update/profile',$siswa->username) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="field has-text-centered">
        <span class="button is-outlined is-primary btn-file">
          Pilih Foto... <input name="foto_profile" id="image" type="file">
        </span>
        <img id="uploadPreview">
    </div>
    <div class="container">
        <div class="columns is-multiline data-siswa">
            <div class="column is-5-tablet is-offset-1-tablet is-10-mobile is-offset-1-mobile is-4 is-offset-2-desktop">
                <ul>
                    <div class="field">
                        <p class="title is-6 label" for="nama">nama</p>
                        <li class="control has-icons-left subtitle is-4">
                            <input autofocus="true" name="nama_siswa" type="text" class="input" value="{{ $siswa->nama_siswa }}">
                        </li>
                    </div>
                    <div class="field">
                        <p class="title is-6 label" for="username">username</p>
                        <li class="control has-icons-left subtitle is-4">
                            <input type="text" name="username" class="input" value="{{ $siswa->username }}">
                        </li>
                    </div>
                    <div class="field">
                        <p class="title is-6 label" for="kelas">kelas</p>
                        <li class="control has-icons-left subtitle is-4">
                            <input type="text" name="kelas" class="input" readonly value="{{ $siswa->kelas }}">
                        </li>
                    </div>
                </ul>
            </div>
            <div class="column is-5-tablet is-10-mobile is-offset-1-mobile is-4">
                <ul>
                    <div class="field">
                        <p class="title is-6 label" for="nisn">nisn</p>
                        <li class="control has-icons-left subtitle is-4">
                            <input class="input" name="nisn" type="text" readonly value="{{ $siswa->nisn }}">
                        </li>
                    </div>
                    <div class="field">
                        <p class="title is-6 label" for="email">email</p>
                        <li class="control has-icons-left subtitle is-4">
                            <input class="input" name="email" type="email" value="{{ $siswa->email }}">
                        </li>
                    </div>
                </ul>
            </div>
            <div class="column is-5-tablet is-offset-1-tablet is-10-mobile is-offset-1-mobile is-4 is-offset-2-desktop">
                <ul>
                    <div class="field">
                        <p class="title is-6 label" for="kata-sandi">
                            Kata sandi baru
                        </p>
                        <li class="control has-icons-left subtitle is-4">
                            <input class="input" name="password" type="password">
                        </li>
                    </div>
                </ul>
            </div>
            <div class="column is-5-tablet is-10-mobile is-offset-1-mobile is-4-desktop">
                <ul>
                    <div class="field">
                        <p class="title is-6 label" for="kata-sandi2">
                            Konfirmasi kata sandi baru
                        </p>
                        <li class="control has-icons-left subtitle is-4">
                            <input class="input" type="password">
                        </li>
                    </div>
                </ul>
            </div>
            <div class="column is-5-tablet is-offset-1-tablet is-10-mobile is-offset-1-mobile is-8 is-offset-2-desktop data-siswa">
                <button type="submit" class="button is-primary">Submit</button>
                <a class="button is-default" href="{{ url('/') }}">Kembali</a>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection

@section('script')
<script>
  $('#container').css({
        'background-color':'#efefef'
    });
  $(document).ready(function(){
  $("#image").change(function(){
    var file = document.getElementById("image").files[0];
    var readImg = new FileReader();
    readImg.readAsDataURL(file);
    readImg.onload = function(e) {
       $('#uploadPreview').attr('src',e.target.result).fadeIn();
    }
  })
});
</script>
@endsection