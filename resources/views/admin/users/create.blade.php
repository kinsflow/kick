@extends('includes.navbar')
@section('content')
    <div class="container">

        <div class="row">
<h1>Create Users</h1>
            <div class="form-group">

                {!! Form::open(['action' => 'AdminUsersController@store', 'enctype' => 'multipart/form-data']) !!}
                
                    <div class="form-group">
                        {!! Form::label('name') !!}
                        {!! Form::text('name',null, ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email') !!}
                        {!! Form::email('email',null, ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password') !!}
                        {!! Form::password('password', ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role') !!}
                        {!! Form::select('role', $roles, null, ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status') !!}
                        {!! Form::select('status', [1 => 'online', 2 => 'not active'],null, ['class'=>'form-control',]) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('photo_id','choose file') !!}
                    {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
                </div>
                    <div class="form-group">
                        {!! Form::submit('submit', ['class'=>'btn btn-primary',]) !!}
                    </div>
                {!! Form::close() !!}

            </div>

        </div>
        @include('includes.error')
    </div>
@stop