@if(sizeof($inspections) == 0)
    No results found.
@endif

@foreach($inspections as $inspection)
    <div class='inspection'>
        <h4>
            <a href='/inspection/show/{{$inspection->id}}'>{{ $inspection->name }} - {{ $inspection->description }}</a>
        </h4>
    </div>
@endforeach
