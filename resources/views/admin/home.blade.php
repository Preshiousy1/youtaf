@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary mb-3">Create a new Post</a>
                    <h2>Your Blog Posts</h2>
                    <hr>
                    @if(count($posts)>0)
                        <table class="table table-striped border border-grey rounded">
                            <tr>
                                <th style="width:60%">Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                    <td><span><a href="/posts/{{$post->id}}">{{$post->title}}</a></span> </td>
                                <td ><a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a></td>
                                <td>
                                    {!!Form::open( ['id' => "deleteForm$post->id",'action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::button('Delete', ['class' => 'btn btn-danger', 'onclick' => "submitConfirm($post->id);"])}}
                            
                                {!!Form::close() !!}
                                <script>
                                        function submitConfirm(x){
                                            if(window.confirm('Are you sure you want to delete this?')){
                                                document.getElementById('deleteForm'+x).submit();
                                            }
                                        }
                                        
                                </script>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                        <p><h5 style="font-family:inherit; font-weight:normal;">You have no posts yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
