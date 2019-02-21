@extends('includes.navbar')
@section('content')
    <div class="container">
        <h1>Categories</h1>

        <div class="col-sm-6">
            <form  action="{{action('AdminCategoriesController@store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    <div class="row col-sm-6">

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)

                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{action('AdminCategoriesController@edit', $category->id)}}">{{$category->name}}</a></td>
                    <td><b>{{$category->created_at->diffForHumans()}}</b></td>


                </tr>

            @endforeach
            </tbody>
        </table>

    </div>
    </div>
@stop