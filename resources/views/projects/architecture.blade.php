@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, projects, projecten, projets, portfolio, achievements, images, gallery
@endsection

@section('title')
    Architecture
@endsection

@section('content')
    <div class="content">
        @auth
            <div class="editSection w3-display-container">
                <i class="fa fa-edit w3-xxlarge w3-display-topleft"></i>

                <div class="addSection">
                    <form action="{{ route('architectuur', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h3>Add a New Project</h3>

                        <label for="projectTitle">Project title: </label> <br>
                        <input type="text" id="sectionTitle" name="projectTitle" placeholder=" (example: 1978-Reel-Boom)">
                        <h3>Select your Images</h3>
                        <label for="projectCover">Cover image: </label>
                        <input type="file" id="sectionCover" name="projectCover">
                        <br>
                        <label for="projectGallery">Gallery images: </label>
                        <input type="file" id="sectionGallery" name="projectGallery[]" multiple>
                        <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Upload new project</button>
                    </form>
                </div>
            </div>
        @endauth
        <div class="card-group">
            @foreach ($projects as $project)
                <?php $title = str_replace("-", " ", $project->title) ?>
                <div class="project-card">
                    <a href="{{ route('project-title', ['project' => $project->project_name, 'locale' => app()->getLocale() ] )  }}" class="fullsizable">
                        <img alt="{{ $title }}" title="{{ $title }}" src="{{ asset('storage/' . $project->project_image)}}">
                        <p>{{ ucwords($title) }}</p>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
