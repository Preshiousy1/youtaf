@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

@endsection

@section('content')
     @include('partials.single-blog')

@endsection