@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="my-5 "><a href="/posts"><button class="btn btn-light border-primary">Back</button></a></div>

    <h1>{{$post->title}}</h1>
    
    <div class="container m-4 p-5"><img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%" alt="Cover Image">
    </div>
    <br><br>
    <div class="card my-2 border border-grey p-5">
        <p>{!!$post->body!!}</p>
    </div>
    <h6>Post Categories</h6>

    <ul>
        @foreach($post->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <hr><small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

    <hr>

   @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" >Edit</a>

            
            {!!Form::open( ['id' => "deleteForm$post->id",'action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::button('Delete', ['class' => 'btn btn-danger', 'onclick' => "submitConfirm($post->id);" ] )}}

            {!!Form::close() !!}
            <script>
                    function submitConfirm(x){
                        if(window.confirm('Are you sure you want to delete this?')){
                            document.getElementById('deleteForm'+x).submit();
                        }
                    }  
            </script>
        @endif
    @endif

</div>
@endsection