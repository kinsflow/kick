@extends('includes.navbar')
@section('content')
    <div class="container">

        <div class="row">
<h1>h1</h1>
            <div class="form-group">

                {!! Form::open(['action' => 'AdminUsersController@store']) !!}
                
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
                        {!! Form::password('password',null, ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role') !!}
                        {!! Form::text('role',null, ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status') !!}
                        {!! Form::text('status',null, ['class'=>'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('submit',null, ['class'=>'btn btn-success',]) !!}
                    </div>
                {!! Form::close() !!}

            </div>

        </div>

    </div>
@stop