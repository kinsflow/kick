@extends('includes.navbar')
@section('content')
    <div>
        @if(Session::has('message'))
            <p class="alert alert-danger">{{session('message')}}</p>
        @endif
    </div>
    <div class="container">

        <div class="row">

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Owner</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a title="Edit This Post" href="{{action('AdminPostsController@edit', $post->id)}}">{{$post->user->name}}</a></td>
                        <td>{{$post->category_id ? $post->category->name : 'uncategorized'}}</td>
                        <td><img height="50" src="/images/{{$post->photo ? $post->photo->file_path : 'no photo'}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><b>{{$post->created_at->diffForHumans()}}</b></td>
                        <td><b>{{$post->updated_at->diffForHumans()}}</b></td>


                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>

    </div>
@stop