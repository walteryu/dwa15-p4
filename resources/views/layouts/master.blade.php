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
            <h2>Lorem Ipsum & Random User Generator</h2>
        </header>

        <section>
            @yield('content')
        </section>

        <footer>
            <br>
            <h4>
                Background Image Provided by <a href="http://subtlepatterns.com/">Subtle Patterns</a>
            </h4>
            <br>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')
</body>
</html>
