<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Foobooks')
    </title>

    <meta charset='utf-8'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

    <link rel="stylesheet" href="css/styles.css" />

</head>
<body>

    <header>
        <div class="text-center">
            <h1>Developer's Best Friend Application</h1>
            <h3>Lorem Ipsum & Random User Generator</h3>
        </div>
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer>
        <div class="container">
            &copy; {{ date('Y') }}
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
