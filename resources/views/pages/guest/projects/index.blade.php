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
            @foreach ($projects as $project)
                <?php $title = str_replace("-", " ", $project->title) ?>
                <div class="project-card">
                    <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="fullsizable">
                        <img alt="{{ $title }}" title="{{ $title }}" src="{{ asset('storage/' . $project->image)}}">
                        <p>{{ ucwords($title) }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection