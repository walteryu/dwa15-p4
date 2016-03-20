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

    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
</head>
<body>
    <div class="container">
        <header>
            <h2>
                <a href="/lorem-ipsum">Developer's Best Friend Application</a>
            </h2>
            <h3>Lorem Ipsum & Random User Generator</h3>
        </header>

        <section>
            {{-- Main page content will be yielded here --}}
            @yield('content')
        </section>

        <footer>
            &copy; {{ date('Y') }}
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
