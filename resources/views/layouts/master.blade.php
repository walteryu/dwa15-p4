<!doctype html>
<html>
<head>
    <title>
        @yield('title','Developer App')
    </title>

    <meta charset='utf-8'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    @yield('head')

    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
</head>
<body>
    <div class="container">
        <header>
            <h1>
                <a href="/">Developer's Best Friend Application</a>
            </h1>
            <h3>Lorem Ipsum & Random User Generator</h3>
        </header>

        <section>
            @yield('content')
        </section>

        <footer>
            <h5>
              <br><a href="http://subtlepatterns.com/">Background Image Provided by Subtle Patterns</a><br>
            </h5>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')
</body>
</html>
