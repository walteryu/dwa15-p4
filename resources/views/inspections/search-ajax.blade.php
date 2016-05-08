@if(sizeof($books) == 0)
    No results found.
@endif

@foreach($books as $book)
    <div class='book'>
        <a href='/book/show/{{$book->id}}'>{{ $book->title }}</a>
    </div>
@endforeach
