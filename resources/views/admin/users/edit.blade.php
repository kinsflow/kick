@extends('includes.navbar')
@section('content')
    <div class="container">

        <div class="row">
            <h1>Edit Users</h1>
            <div class="col-sm-2" id="reloadDiv">
                <img src ="/images/{{$user->photo ? $user->photo->file_path : 'no Photo'}}" data-toggle="modal" data-target="#myModal" id="upload_image" class="img-responsive img-circle"/>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        {{--UPLOAD IMAGE--}}
                        <form method="POST"
                              action="{{ action('AdminUsersController@dropzone', $user->id) }}"
                              enctype="multipart/form-data"
                              class="dropzone"
                              id="image"
                        >{{ csrf_field() }}</form>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-8">


                <form action="{{route('admin.update', $user->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Role</label>
                        <select name="roles" class="form-control">
                            @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="cars" class="form-control">
                            <option value="1">Online</option>
                            <option value="0">Not-Active</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo_id">Photo</label>
                        <input type="file" name="photo_id">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Edit" class=" btn btn-success col-sm-6">
                    </div>
                </form>
                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete ', ['class'=>'btn btn-danger col-sm-6']) !!}
                </div>
                {!! Form::close() !!}
                {{--{!! Form::model($user, ['method' => 'POST', 'action' => ['AdminUsersController@update', $user->id], 'enctype' => 'multipart/form-data']) !!}--}}

                {{--<div class="form-group">--}}
                    {{--{!! Form::label('name') !!}--}}
                    {{--{!! Form::text('name',null, ['class'=>'form-control',]) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('email') !!}--}}
                    {{--{!! Form::email('email',null, ['class'=>'form-control',]) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('password') !!}--}}
                    {{--{!! Form::password('password', ['class'=>'form-control',]) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('role') !!}--}}
                    {{--{!! Form::select('role', $roles, null, ['class'=>'form-control',]) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('status') !!}--}}
                    {{--{!! Form::select('status', [1 => 'online', 2 => 'not active'],null, ['class'=>'form-control',]) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('photo_id','choose file') !!}--}}
                    {{--{!! Form::file('photo_id',null, ['class'=>'form-control']) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::submit('submit', ['class'=>'btn btn-primary',]) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}


            </div>

        </div>
    </div>

    <script>
        Dropzone.options.image = {
            init: function () {
                this.on('complete', function (file) {
                    if (file.status !== 'success') {
                        return alert('Invalid File Type Or Size');
                    }
                    console.log(file);
                    var src = $('.dz-image img').attr('src');
                    var dp = $('#upload_image');
                    var modal = $('#myModal');

                    dp.attr('src', src);
                    modal.modal('hide');

                })
            }
        }
    </script>
@stop