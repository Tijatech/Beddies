<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beddies') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">



    <script>

             function show(){
                var dropdown_item = document.getElementById('dropdown_menu');

                var sty = dropdown_item.style.display;
                if (sty == 'none' ) {
                    dropdown_item.style.display = 'block';
                } else {
                    dropdown_item.style.display = 'none';
                }
            };

            </script>
</head>
<body>
    <div id="app">


            <nav>
                    <div class="navbar">
                        <h3><a class="logo" href="{{ url('/') }}">{{config('app.name','Beddies')}}</a> </h3>
                        <div class="navItems">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>

                            </ul>

                            <ul class="dashLog">
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

                                    <li><a href="/cart">Cart</a></li>
                                        <li class="nav-item dropdown" onclick="show()" style="cursor:pointer; position:relative;">
                                            <a id="navbarDropdown"  class=" dropdown-toggle"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div id="dropdown_menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                               @if (Auth::user()->auth == 1)
                                                    <a href="/dashboard">Dashboard</a>
                                                @endif
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
            @yield('content')
        </main>
    </div>

    <footer>
        <div>Copyright &copy;2020</div>
        <div class="logo">Beddies</div>
    </footer>
</body>
</html>
