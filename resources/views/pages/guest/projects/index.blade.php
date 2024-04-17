@extends("layout")

@section('seo')
belderbos, marc, architecturer, projects, projecten, projets, portfolio, achievements, images, gallery
@endsection

@section('title')
    Architecture
@endsection

@section('content')
    <div class="content">
        <div class="card-group">
            @if ($projects->isEmpty())
                {!! __('error.no_content') !!}
            @else
            @foreach ($projects as $project)
                <?php $title = str_replace("-", " ", $project->title) ?>
                <div class="project-card">
                    <a href="{{ route('projects.show', ['Project' => $project->slug]) }}" class="fullsizable">
                        <img alt="{{ $title }}" title="{{ $title }}" src="{{ asset($project->cover)}}">
                        <p>{{ ucwords($title) }}</p>
                    </a>
                </div>
            @endforeach
            @endif

        </div>
    </div>
@endsection