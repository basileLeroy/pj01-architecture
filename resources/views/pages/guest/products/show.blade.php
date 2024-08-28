@extends('layout')

@section('seo')
belderbos, marc, architecturer, books, products, <?php echo str_replace("-", ", ", $product->title) ?>
@endsection

@section('title')
    <?php echo str_replace("-", " ", $product->title) ?>
@endsection

@section('content')
<div class="content">
    <div class="detail-display">
        <div class="detail-title">
            <h1>
                {!! ucwords($product->title) !!}
            </h1>
        </div>
        <div x-data class="detail-card">
            <div class="detail-cover">
                <img alt="{{ucwords($product->title)}}" title="{{ ucwords($product->title) }}" src="{{ asset($product->cover) }}">
                <a class="thoughts" href="{{ route('thoughts-' . app()->getLocale()) }}"><button>{!! __('pagination.thoughts') !!}</button></a>    
                <a class="link-to-buy" href="{{ $product->link }}"><button>{!! __('pagination.buyHere') !!}</button></a>    
            </div>
            <div class="detail-content">
                <h3>Synopsys:</h3>
                {!! $product->description ?? __('error.no_content') !!}
            </div>
        </div>
    </div>
</div>
@endsection
