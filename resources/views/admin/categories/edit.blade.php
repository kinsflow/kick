@extends('includes.navbar')
@section('content')
    <div class="container">
        <h1>Categories</h1>

        <div class="col-sm-6">
            <form  action="{{action('AdminCategoriesController@update', $category->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Category" class="btn btn-primary col-sm-6">
                </div>
            </form>
            <form  action="{{action('AdminCategoriesController@destroy', $category->id)}}" method="POST">
                @csrf
               <div class="form-group">
                    <input type="submit" value="Delete Category" class="btn btn-danger col-sm-6">
                </div>
            </form>
        </div>

    </div>
@stop