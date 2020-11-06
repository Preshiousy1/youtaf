@extends('layouts.admin')

@section('content')
<div class="container">
<div style="display:block"><h1 style="display:inline">Posts!</h1>  
<a href="/posts/create" ><button class="btn btn-primary float-right" >Create a new post</button></a>
 </div>
 @if(count($posts)>0)
    <div class=" list-group">
    @foreach ($posts as $post)
        <div class="list-group-item my-2 border border-grey">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                     <img src="/storage/cover_images/{{$post->cover_image}}" height="120px" alt="Cover Image">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        {{-- <p>{!!$post->body!!}</p> --}}
                </div>
            </div>
           
        </div>

    @endforeach
    </div>
    {{$posts->links()}}
 @else
    <p>No Posts Found</p>
 @endif
</div>
@endsection