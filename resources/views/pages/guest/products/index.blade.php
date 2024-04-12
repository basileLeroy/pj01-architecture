@extends('layout')

@section('seo')
belderbos, marc, architecturer, shop, products, books, book, uitgeverij, edition
@endsection

@section('title')
    {{ __('nav.shop') }}
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {{ $primary->content ?? "no content"}}
        </div>

        <hr>
        <div class="card-group">
            @if ($products->isEmpty())
            <p>{{ __('products.notFound') }}</p>
            @else
            @foreach ($detailPages as $product)
                <div class="project-card" >
                    <a href="{{ route('products.index-' . app()->getLocale(), ['Product' => $product->slug])  }}" class="fullsizable">
                        <img alt="{{ $product->title }}" title="{{ $product->title }}" src="{{ asset('storage/' . $product->image)}}">
                        <p>{{ ucwords($product->title) }}</p>
                    </a>
                </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
