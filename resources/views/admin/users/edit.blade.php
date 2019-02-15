@extends('includes.navbar')
@section('content')
    <div class="container">

        <div class="row">
            <h1>h1</h1>
            <div class="form-group">

                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('name') !!}
                    {!! Form::text('name',null, ['class'=>'Form-control',]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email') !!}
                    {!! Form::email('email',null, ['class'=>'Form-control',]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password') !!}
                    {!! Form::password('password',null, ['class'=>'Form-control',]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role') !!}
                    {!! Form::text('role',null, ['class'=>'Form-control',]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status') !!}
                    {!! Form::text('status',null, ['class'=>'Form-control',]) !!}
                </div>
                {!! Form::close() !!}

            </div>

        </div>

    </div>
@stop