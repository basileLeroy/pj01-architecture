@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, <?php echo str_replace("-", ", ", $project) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $cover->title) ?>
@endsection

@section('content')
<div class="content">
    @auth
        <div class="editSection w3-display-container" >
            <input class="toggle-box" id="header1" type="checkbox" >
            <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

            <div class="addSection" style="width:170%">
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

    <div x-data class="project-detail-card">
        <?php
            $title = str_replace("-", " ", $cover->title)
        ?>
        <h3>
{{--            {{ucwords($title)}}--}}
            {!! ucwords($title) !!}

        </h3>
        @auth
            <a @click="alert('Are you sure you want to delete this?')" href="{{ route('deleteProject', ['project'=>$project, 'locale' => app()->getLocale()] ) }}"><button class="delete-item">Delete</button></a>
        @endauth
        <img alt="{{ucwords($title)}}" title="{{ ucwords($title) }}" src="{{ asset('storage/' . $cover->project_image) }}">
        <a class="thoughts" href="{{ route('gedachten', ['locale' => app()->getLocale()] ) }}"><button>{!! __('pagination.thoughts') !!}</button></a>
    </div>

    <div class="gallery">
        @if($imageArray)
            @foreach($imageArray as $sliderImage)
                <a href="{{ asset('storage/' . $sliderImage) }}" data-lightbox="roadtrip"><img src="{{ asset('storage/' . $sliderImage) }}" alt="{{$title}}"></a>
            @endforeach
        @endif
    </div>

    @if($cover->description != null)
        {!! $cover->description !!}
    @endif
</div>

@endsection
