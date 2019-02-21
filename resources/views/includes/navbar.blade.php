<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kick</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/dropzone.js') }}"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kick.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">users<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{action('AdminUsersController@index')}}">All Users</a></li>
          <li><a href="{{action('AdminUsersController@create')}}">Create Users</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">posts<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{action('AdminPostsController@index')}}">All Posts</a></li>
          <li><a href="{{action('AdminPostsController@create')}}">Create Posts</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">categories<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('categories.index')}}">All Categories</a></li>
          <li><a href="{{route('categories.edit')}}">Edit categories</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>

    </ul>
  </div>

</nav>







{{--<ul class="navbar-nav ml-auto float-right">--}}
  {{--<!-- Authentication Links -->--}}
  {{--@guest--}}
    {{--<li class="nav-item float-right">--}}
      {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
    {{--</li>--}}
    {{--@if (Route::has('register'))--}}
      {{--<li class="nav-item float-right">--}}
        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
      {{--</li>--}}
    {{--@endif--}}
  {{--@else--}}
    {{--<li class="nav-item dropdown float-right">--}}
      {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
        {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
      {{--</a>--}}

      {{--<div class="dropdown-menu dropdown-menu-right float-right" aria-labelledby="navbarDropdown">--}}
        {{--<a class="dropdown-item float-right" href="{{ route('logout') }}"--}}
           {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
          {{--{{ __('Logout') }}--}}
        {{--</a>--}}

        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
          {{--@csrf--}}
        {{--</form>--}}
      {{--</div>--}}
    {{--</li>--}}
  {{--@endguest--}}
{{--</ul>--}}





</body>@yield('content')
</html>

