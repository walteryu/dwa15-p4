<!DOCTYPE html>
<html>
<head>
    <title>Show Lorem</title>
    <meta charset='utf-8'>
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
</head>
<body>

    <header>
        <h1>Extra Lorem...</h1>
    </header>

    <section>
        @if(isset($paragraphs))
            {{ implode('<p>', $paragraphs) }}
        @else
            <h1>No Lorem!</h1>
        @endif
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
