@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, <?php echo str_replace("-", ", ", $project) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $cover->title) ?>
@endsection

@section('content')
<div class="project-gallery">
    <div class="fluid projects">
        <div class="project-card">
            <?php
                $title = str_replace("-", " ", $cover->title)
            ?>
            <h3>
                {{ucwords($title)}}
                @auth
                    <a href="{{ route('deleteProject', ['project'=>$project, 'locale' => app()->getLocale()] ) }}" style="margin: 10px;"><button style="background-color: lightcoral; color: white; border-radius: 5px;padding:10px;">Delete</button></a>
                @endauth
            </h3>
            <img alt="{{ucwords($title)}}" title="{{ ucwords($title) }}" src="{{ asset('storage/' . $cover->project_image) }}">
            <a class="thoughts" href="{{ route('gedachten', ['locale' => app()->getLocale()] ) }}"><button>{!! __('pagination.thoughts') !!}</button></a>
        </div>
    </div>

    <div class="fluid intro">
        <div class="gallery">
        @if($imageArray)
            @foreach($imageArray as $sliderImage)
                <a href="{{ asset('storage/' . $sliderImage) }}" data-lightbox="roadtrip"><img src="{{ asset('storage/' . $sliderImage) }}" alt="{{$title}}"></a>
            @endforeach
        @endif
        </div>
    </div>
</div>
<div class="fluid intro" style="width: 650px; margin-top: 50px;">
    @if($cover->description != null)
        {!! $cover->description !!}
    @endif
</div>
{{----}}
@auth
    <div class="editSection w3-display-container" >
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

        <div class="addSection">
            <form action="{{ route('updateProject', ['project'=>$project, 'locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data"  style="min-width: 750px;">
                {{ csrf_field() }}
                <label for="projectTitle">Project title: </label>
                <input type="text" id="sectionTitle" name="projectTitle" placeholder=" (example: 1978-Reel-Boom)">
                <label for="projectCover">Cover image: </label>
                <input type="file" id="sectionCover" name="projectCover">
                <br>
                <label for="projectGallery">Gallery images: </label>
                <input type="file" id="sectionGallery" name="projectGallery[]" multiple>
                <br>
                <label for="description">About This project</label>
                <textarea class="description" id="sectionContent" name="description">
                    @if($cover->description != null)
                        {{$cover->description}}
                    @endif
                </textarea>
                <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Upload new project</button>
            </form>
        </div>
    </div>
@endauth
@endsection
