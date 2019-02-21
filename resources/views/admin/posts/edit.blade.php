@extends('includes.navbar')
@section('content')

    <div class="container">
        <div class="row">
            <h1>Edit posts</h1>
            {!! Form::model($post, ['method' => 'POST', 'action' => ['AdminPostsController@update', $post->id], 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title',null, ['class'=>'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category') !!}
                {!! Form::select('category_id', $category, null, ['class'=>'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','choose file') !!}
                {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body',null, ['class'=>'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('submit', ['class'=>'btn btn-primary col-sm-6',]) !!}
            </div>
            {!! Form::close() !!}



            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete ', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            @include ('includes.error')
        </div>
    </div>

@stop