<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PharmaLive</title>

    
    <link rel="stylesheet" href={{ asset("assets/bootstrap/css/bootstrap.min.css") }} />
    <link rel="stylesheet" href={{ asset("assets/css/styles.css") }} />
    <link rel="stylesheet" href={{ asset("assets/fonts/font-awesome.min.css")}}>
   
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" @guest href="/" @else href='/home' @endguest> PharmaLiv</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Se Connecter') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __("S'inscrire") }}</a></li>
                
                @else
                    <li><a class='nav-link' href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Se Deconnecter') }} </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content');
    </div>
    <script src={{asset("assets/bootstrap/js/bootstrap.min.js")}}></script>
    <script src={{asset("assets/js/jquery.min.js")}}></script>
</body>
</html>