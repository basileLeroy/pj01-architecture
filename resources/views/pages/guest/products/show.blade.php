@extends('layout')

@section('seo')
belderbos, marc, architecturer, <?php echo str_replace("-", ", ", $product->title) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $product->title) ?>
@endsection

@section('content')
<div class="content">
    <div class="card-body">
        {{-- <div x-data class="project-detail-card">
            <?php
                // $title = str_replace("-", " ", $product->title)
            ?>
            <h3>
                {!! ucwords($title) !!}
            </h3>
            <img alt="{{ucwords($title)}}" title="{{ ucwords($title) }}" src="{{ asset('storage/' . $product->image) }}">
            <a class="thoughts" href="{{ route('thoughts-' . app()->getLocale()) }}"><button>{!! __('pagination.thoughts') !!}</button></a>
        </div>
        <div class="card-content">
            <div class="text-box">
                {!! $product->content ?? __('error.no_content') !!}
            </div>
        </div> --}}
    </div>
</div>
@endsection
