<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          @auth
            <div class="container-fluid">
              <div class="row">

                <div class="col-md-3">
                  <div class="list-group">
                    <a href="{{route('home')}}" class="list-group-item ">Home</a>
                    <a href="{{route('post')}}" class="list-group-item ">Show  Posts</a>
                    <a href="{{route('category')}}" class="list-group-item">Show All Category</a>
                    <a href="{{route('tag')}}" class="list-group-item">Show All Tag</a>
                    <a href="{{route('post.trashed')}}" class="list-group-item ">Show Trashed Posts</a>
                    <a href="{{route('post.create')}}" class="list-group-item">Create New Post</a>
                    <a href="{{route('category.create')}}" class="list-group-item">Create New Category</a>
                    <a href="{{route('tag.create')}}" class="list-group-item">Create New Tag</a>
                    <a href="{{route('user')}}" class="list-group-item">show Users</a>


                  </div>
                </div>

                <div class="col-md-9">
                  @yield('content')
                </div>

              </div>
            </div>
          @else
            @yield('content')
          @endguest

        </main>

    </div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{asset('js/toastr.min.js')}}" ></script>

<script type="text/javascript">
  @if (Session::has('success'))
    toastr.success('{{Session::get('success')}}')
  @endif
  @if (Session::has('info'))
    toastr.info('{{Session::get('info')}}')
  @endif
</script>










</body>
</html>
