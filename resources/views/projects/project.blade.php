@extends('layout')
@extends('header')

@section('title')
    Project
@endsection

@section('project')
<div class="project-gallery">
    <div class="fluid projects">
        <div class="project-card">
            <?php
                $title = str_replace("-", " ", $project)
            ?>
            <h3>{{ucwords($title)}}</h3>
            <img alt="{{ $cover->project_name }}" title="{{ $cover->project_name }}" src="{{url('/images/architectuur/icons/'.$cover->project_image)}}">
            <a class="thoughts" href="mailto:{{ env('MAIL_ADMIN') }}"><button>{!! __('pagination.thoughts') !!}</button></a>

        </div>
    </div>

    <div class="fluid intro">

        <div class="gallery">

            @foreach(File::glob(public_path('images/architectuur/slider/').$project.'/*') as $path)
                <a href="{{ str_replace(public_path(), '', $path) }}" data-lightbox="roadtrip"><img src="{{ str_replace(public_path(), '', $path) }}" alt=""></a>
            @endforeach

        </div>
    </div>
</div>
@endsection
