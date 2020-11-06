@extends('layouts.admin')

@section('content')
<div class="jumbotron">
    <div class="container">
      <h1 class="display-4">Welcome to SpeakYourTruth.com!</h1>
      <p>This is a website where you can write blogs freely expressing your views on any and every topic without fear or hesitation.
           Your nwords could cause a shift and make a difference for your generation.
           Hence be careful about what you post and use this platform as a starting point to create something world changing!!!</p>
      <p><a class="btn btn-primary btn-lg" href="/about" role="button">Learn more &raquo;</a></p>
      <div style="margin-left:400px">
        {{-- <a class="btn btn-success btn-lg" href="/register" role="button">Signup</a>
        <a class="btn btn-warning btn-lg" href="/login" role="button">Login</a> --}}
     
      @guest
     
      <a class=" btn btn-lg btn-success mr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
 
  @if (Route::has('register'))
     
          <a class="btn btn-lg btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
     
  @endif

@endguest
</div>
    </div>
  </div>
@endsection