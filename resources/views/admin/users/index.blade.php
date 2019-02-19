@extends('includes.navbar')
@section('content')
<div class="container">

    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                   <tr>

                       <td>{{$user->id}}</td>
                       <td><a href = {{route('admin.users.edit', $user->id)}}>{{$user->name}}</a></td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->role->name}}</td>
                       <td><img height="50" src="/images/{{$user->photo ? $user->photo->file_path : 'https://placehold.it/400x400'}}"/></td>
                       <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                       <td><b>{{$user->created_at->diffForHumans()}}</b></td>
                       <td><b>{{$user->updated_at->diffForHumans()}}</b></td>


                   </tr>

                @endforeach
            </tbody>
        </table>

    </div>

</div>
@stop