@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" >
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <a href="/categories/create" class="btn btn-primary mb-3">Create a new Category</a> -->
                    @if($edit ?? '' != null)
                    {!! Form::open(['action' => ['CategoryController@update', $edit->id], 'method' => 'PUT']) !!}
                            <div class="form-group d-inline">
                                {{Form::text('name', $edit->name, ['class' => 'form-control d-inline w-75 mr-4', 'placeholder'=> 'Name'])}}
                            </div>

                            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}

                    @else

                        {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
                            <div class="form-group d-inline">
                                {{Form::text('name', '', ['class' => 'form-control d-inline w-75 mr-4', 'placeholder'=> 'Add a new category here'])}}
                            </div>

                            {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}

                    @endif
                   

                    <h2 class="mt-4">Your Blog Categories</h2>
                    <hr>
                    @if(count($categories) != 0)
                        <div  style="overflow-y: scroll; max-height: 400px;">
                            <table class="table table-striped border border-grey rounded">
                                <tr>
                                    <th style="width:60%">Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($categories as $category)
                                <tr>
                                    <td><span><a href="/categories/{{$category->id}}">{{$category->name}}</a></span> </td>
                                    <td ><a href="/categories/{{$category->id}}/edit" class="btn btn-dark">Edit</a></td>
                                    <td>
                                        {!!Form::open( ['id' => "deleteForm$category->id",'action' => ['CategoryController@destroy', $category->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::button('Delete', ['class' => 'btn btn-danger', 'onclick' => "submitConfirm($category->id);"])}}
                                
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
                        </div>
                    @else
                        <p><h5 style="font-family:inherit; font-weight:normal;">You have no categories yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection