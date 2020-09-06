<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name', 'InstaClone') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->

<!-- Material Design Bootstrap -->



</head>
<body>
    <div id="app">

        <!-- Header section -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container px-2">

              

                <!-- Links -->
                <div class="navbar-collapse collapse justify-content-stretch" id="navbar5">
                   <div class="d-flex justify-content-arround w-100">
                        <form action="/search" method="POST" role="search">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" name="q" type="search" placeholder="Search" id="searchtest" aria-label="Search">
                                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" style="border-color: #ced4da"><i class="fas fa-search"></i></button>
                            </div>
                        </form>

                        <div class="formtest">
                            <a href="{{ url('/') }}" class="navbar-brand">
                                <img src="{{asset('img/instagram.png')}}" alt="InstaMaroc Logo" width="100px" >
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>  
                   </div>  
                </div>


                  {{-- info --}}

                  <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item px-2 {{ Route::is('post.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <i class="fas fa-home fa-2x"></i>
                                </a>
                            </li>
                            <li class="nav-item px-2 {{ Route::is('post.explore') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/explore') }}">
                                    <i class="far fa-compass fa-2x"></i>
                                </a>
                            </li>
                            {{-- <li class="nav-item px-2 ">
                                <a class="nav-link" href="#">
                                    <i class="far fa-heart fa-2x"></i>
                                </a>
                            </li> --}}
                            <li class="nav-item px-2">
                                <a href="/profile/{{Auth::user()->username}}" class="nav-link" style="width: 42px; height: 22px; padding-top: 6px;" >
                                    <img src="{{ asset(Auth::user()->profile->getProfileImage())  }}" class="rounded-circle w-100">
                                    {{-- <i class="far fa-user fa-2x"></i> --}}
                                </a>
                            </li>

                            <!-- Add more dropdown in Profile Page -->
                            <!-- To get current routedd(Route::currentRouteName())  -->
                            @if (Route::is('profile.index'))

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        @can('update', Auth::user()->profile)
                                            <a class="dropdown-item" href="/p/create" role="button">
                                                Add New Post
                                            </a>
                                        @endcan

                                        @can('update', Auth::user()->profile)
                                            {{-- <a class="dropdown-item" href="/stories/create" role="button">
                                                Add New Story
                                            </a> --}}
                                        @endcan

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
                            @endif

                        @endguest
                    </ul>


                  {{-- end info --}}
                  <!-- Logo -->
             

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('exscript')
     

    <footer>
        <!-- Footer -->
<footer class="page-footer font-small cyan darken-3">

    <!-- Footer Elements -->
    <div class="container">
  
      <!-- Grid row-->
      <div class="row">
  
        <!-- Grid column -->
        <div class="col-md-12 py-2 pt-5 text-center d-flex justify-content-center align-items-center">
          <div class=" flex-center">
  
            <!-- Facebook -->
            <a href="https://www.facebook.com/oiseau.reveuse/" class="fb-ic icontest">
              <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            {{-- <!-- Twitter -->
            <a class="tw-ic  icontest">
              <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a> --}}
            <!--Linkedin -->
            <a href="https://www.linkedin.com/in/sara-ouldjelloul-26b904160/" class="li-ic  icontest">
              <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Instagram-->
            <a href="https://www.instagram.com/saraol987509/" class="ins-ic  icontest">
              <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Portfolio-->
            <a href="https://sara-ol.com/" class="pin-ic icontest">
              <i class="far fa-smile-beam white-text fa-2x"></i>
            </a>
          </div>
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row-->
  
    </div>
    <!-- Footer Elements -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 InstaMaroc buid by ❤.
      <a href="https://sara-ol.com/"> Sara Ouldjelloul</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
    </footer>
</body>
</html>
