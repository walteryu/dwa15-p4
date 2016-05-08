<!doctype html>
<html>
<head>
    <title>
        @yield('title','StormSafe')
    </title>

    <meta charset='utf-8'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>

    <!-- D3.js & C3.js library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    @yield('head')

    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand">StormSafe</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li class="active"><a href="/">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href='/projects'>Projects</a></li>
                        <li><a href='/inspections'>Inspections</a></li>
                        <li><a href='/logout'>Log out</a></li>
                    @else
                        <li class="active"><a href="/login">Login<span class="sr-only">(current)</span></a></li>
                        <li><a href='/register'>Register</a></li>
                    @endif
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        </header>

        <section>
            @if(Session::has('message'))
              <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif

            @yield('content')
        </section>

        <footer>
            <h4>
                Background Image Provided by <a href="http://subtlepatterns.com/">Subtle Patterns</a>
            </h4>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')
</body>
</html>
