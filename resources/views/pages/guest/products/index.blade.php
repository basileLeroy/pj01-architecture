@extends('layout')

@section('seo')
belderbos, biography, bio, architecturer, about
@endsection

@section('title')
    {{ __('nav.shop')}}
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {!! $product->content ?? __('error.no_content') !!}
        </div>
    </div>
@endsection