@extends('includes.navbar')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo_Name</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img height="50" src="/images/{{$photo->file_path ? $photo->file_path: 'no photo'}}"></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans(): 'no date'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection