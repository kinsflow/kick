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
                              action="{{ route('admin.dropzone', $user->id) }}"
                              enctype="multipart/form-data"
                              class="dropzone"
                              id="image"
                        >{{ csrf_field() }}</form>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-8">

                {!! Form::model($user, ['method' => 'POST', 'action' => ['AdminUsersController@update', $user->id], 'enctype' => 'multipart/form-data']) !!}

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
    <span id="uploaded_image"></span>
    </div>
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$('#getData').load(#getData);--}}
            {{--refresh();--}}
        {{--});--}}
        {{--function refresh()--}}
        {{--{--}}
            {{--setInterval(function()--}}
            {{--{--}}
              {{--$('#getData').load(#getData);--}}
              {{--refresh();--}}
            {{--},200);--}}
        {{--}--}}

        {{--</script>--}}
    {{--<script type="text/javascript">--}}

        {{--function dis()--}}
        {{--{--}}

            {{--xmlhttp = new XMLHttpRequest();--}}
            {{--xmlhttp.open('GET', 'edit.blade.php', false);--}}
            {{--xmlhttp.send(null);--}}
            {{--document.getElementById('getData').innerHTML=xmlhttp.responseText--}}

        {{--}--}}
        {{--dis();--}}
        {{--setInterval(function () {--}}
            {{--dis();--}}
        {{--},2000);--}}
    {{--</script>--}}



   {{--<script>--}}
       {{--$(document).ready(function(file){--}}
           {{--$('#uploaded_image').on('complete')--}}

       {{--});--}}
   {{--</script>--}}
    
    <script>
        Dropzone.options.image = {
            init: function () {
                this.on('complete', function (file) {
                    if (file.status !== 'success') {
                        return alert('there was an error');
                    }

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