@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">


@endsection

@section('content')
   
     @include('partials.blog')

@endsection
