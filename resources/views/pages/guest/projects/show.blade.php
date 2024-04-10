@extends('layout')

@section('seo')
belderbos, marc, architecturer, <?php echo str_replace("-", ", ", $project->title) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $project->title) ?>
@endsection

@section('content')
<div class="content">
    <div class="card-body">
        <div x-data class="project-detail-card">
            <?php
                $title = str_replace("-", " ", $project->title)
            ?>
            <h3>
                {!! ucwords($title) !!}
            </h3>
            <img alt="{{ucwords($title)}}" title="{{ ucwords($title) }}" src="{{ asset('storage/' . $project->cover) }}">
            <a class="thoughts" href="{{ route('thoughts-' . app()->getLocale()) }}"><button>{!! __('pagination.thoughts') !!}</button></a>
        </div>
        <div class="card-content">
            <div class="gallery">
                @if($project->gallery)
                    @foreach($project->gallery as $sliderImage)
                        <a href="{{ asset('storage/' . $sliderImage) }}" data-lightbox="roadtrip">
                            <img src="{{ asset('storage/' . $sliderImage) }}" alt="{{$title}}">
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="text-box">
                @if($project->description != null)
                    {!! $project->description !!}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
