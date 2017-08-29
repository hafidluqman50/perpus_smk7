@extends('Main.layout.layout-app')
@section('title'){{$title}}@endsection
@section('content')
<section id="login">
  <div class="container">
    <div class="columns">
      <div class="column is-offset-3-tablet is-6-tablet is-one-third-desktop is-offset-one-third-desktop" align="center">
        <div class="card">
          <div class="card-content">
          <figure>
            <img src="{{asset('/front-assets/img/logo.png')}}" alt="">
            <figcaption>
              <h3 class="title is-3">Login</h3>
            </figcaption>
          </figure>
          @if (count($errors)>0)
            @foreach ($errors->all() as $error)
            <div class="notification is-danger" id="show-notif">
            <button class="delete" id="dismiss"></button>
              {{ $error }}
            </div>
            @endforeach
          @endif
          @if (session()->has('log'))
            <div class="notification is-danger" id="show-notif">
            <button class="delete" id="dismiss"></button>
              {{ session('log') }}
            </div>
          @endif
          <form action="{{ url('/login/auth') }}" method="POST">
          {{ csrf_field() }}
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="text" name="username" placeholder="Username">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" id="pass" type="password" name="password" placeholder="Password">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <input type="checkbox" id="check">
            <label for="" class="checkbox">
              Lihat Password
            </label>
          </div>
          <div class="field">
              <button class="button is-primary">Login</button>
          </div>
          </form>
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
  $('body').css({
    'background-size':'cover',
    'background-image':'url(/front-assets/img/pattern.png)',
    'background-image': 'linear-gradient(to right, rgba(20,30,48,0.98) 0%, rgba(36, 59, 85, 0.98) 100%), url(/front-assets/img/pattern.png)',
    'z-index':'auto'
});
  $('#check').on('click',function(){
    if ($(this).is(':checked')) {
      $('#pass').attr('type','text');
    }
    else {
      $('#pass').attr('type','password');
    }
  });
  $('#dismiss').on('click',function(){
    $('#show-notif').hide();
  });
});
</script>
@endsection