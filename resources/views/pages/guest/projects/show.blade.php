@extends('layout')

@section('seo')
belderbos, marc, architecturer, <?php echo str_replace("-", ", ", $project->title) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $project->title) ?>
@endsection

@section('content')
<div class="content">
    <div class="detail-display">
        <div class="detail-title">
            <h1>
                {!! ucwords($project->title) !!}
            </h1>
        </div>
        <div x-data class="detail-card">
            <div class="detail-cover">
                <img alt="{{ucwords($project->title)}}" title="{{ ucwords($project->title) }}" src="{{ asset($project->cover) }}">
                <a class="thoughts" href="{{ route('thoughts-' . app()->getLocale()) }}"><button>{!! __('pagination.thoughts') !!}</button></a>    
                <a class="link-to-buy" href="{{ $project->link }}"><button>{!! __('pagination.buyHere') !!}</button></a>    
            </div>
            <div class="detail-content">
                <div class="detail-gallery" id="" >
                    @if($project->gallery)
                        @foreach($project->gallery as $image)
                            <a
                                href="{{ asset($image) }}"
                                data-fslightbox="gallery-item"
                            >
                                <img src="{{ asset($image) }}" alt="{{$project->title}}">
                            </a>
                        @endforeach 
                    @endif
                </div>
                {!! $project->description ?? __('error.no_content') !!}
            </div>
        </div>
    </div>
</div>
{{-- <div class="content">
    <div class="detail-display">
        <div class="detail-title">
            <h1>
                {!! ucwords($project->title) !!}
            </h1>
        </div>
        <div x-data class="detail-card">
            <div class="detail-cover">
                <img alt="{{ucwords($project->title)}}" title="{{ ucwords($project->title) }}" src="{{ asset($project->cover) }}">
                <a class="thoughts" href="{{ route('thoughts-' . app()->getLocale()) }}"><button>{!! __('pagination.thoughts') !!}</button></a>    
            </div>
            <div class="detail-content">

                {!! $project->description ?? __('error.no_content') !!}
            </div>
        </div>
    </div>
</div> --}}
@vite(['resources/js/lightbox/fslightbox.js'])

@endsection
