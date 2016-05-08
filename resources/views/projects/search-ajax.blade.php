@if(sizeof($projects) == 0)
    No results found.
@endif

@foreach($projects as $project)
    <div class='project'>
        <h4>
            <a href='/project/show/{{$project->id}}'>{{ $project->name }} - {{ $project->description }}</a>
        </h4>
    </div>
@endforeach
