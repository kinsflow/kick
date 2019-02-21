@extends('includes.navbar')
@section('content')
    <div class="container">
        <div class="row">
            <h1>create posts</h1>
            <form action="{{action('AdminPostsController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="">
                </div>
                <div class="form-group">
                    <label for="category">Description:</label>
                    <select class="form-control" name="category_id">
                        @foreach ($category as $desc)
                        <option value="{{$desc->id}}">{{$desc->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo_id">Photo:</label>
                    <input type="file"  name="photo_id" id="">
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" class="form-control" id=""  rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="submit">
                </div>
            </form>
        </div>
        <div class="row">
        @include ('includes.error')
        </div>
    </div>
@stop