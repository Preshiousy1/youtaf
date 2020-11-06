@extends('layouts.app')

@section('content')
<?php
    function phoneNum($num){
        // $data = '+11234567890';
        $data = $num;

        if(  preg_match( '/^\+(\d{1})(\d{3})(\d{3})(\d{4})$/', $data,  $matches ) )
        {
            $result = $matches[1].' ('.$matches[2] . ') ' .$matches[3] . '-' . $matches[4];
            return $result;
        }
    }
?>
    @include('partials.home')
    @include('partials.discover')
    @include('partials.gallery')
    @include('partials.blog-section')
    @include('partials.contact')
    
@endsection