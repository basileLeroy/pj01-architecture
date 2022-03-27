@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, <?php echo str_replace("-", ", ", $project) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $project) ?>
@endsection

@section('project')
<div class="project-gallery">
    <div class="fluid projects">
        <div class="project-card">
            <?php
                $title = str_replace("-", " ", $project)
            ?>
            <h3>{{ucwords($title)}}</h3>
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
@endsection
