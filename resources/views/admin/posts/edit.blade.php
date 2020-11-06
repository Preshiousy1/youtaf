@extends('layouts.admin')

@section('content')
<div class="container">
<h1>Edit Post</h1>  
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder'=> 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $post->body, ['id'=>'editor','class' => 'form-control', 'placeholder'=> 'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    @if(count($categories)>0)
        <div class="form-group">
        <!-- {!! Form::select('category[]', $categories, null, ['multiple' => true, 'class' => 'form-control margin']) !!} -->
            <select name="category[]"  id="select" multiple data-max-options="2" title="Choose the Category..." data-style="btn-secondary">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" <?php foreach($post->categories as $cat){if($cat->id == $category->id){echo "selected";} } ?> > {{ $category->name }}</option>
                @endforeach
            </select>

        </div>
    @endif
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

</div>
@endsection