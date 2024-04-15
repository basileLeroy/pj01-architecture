@extends('layout')

@section('seo')
belderbos, biography, bio, architecturer, about
@endsection

@section('title')
    Biography
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {!! $article->content ?? __('error.no_content') !!}
        </div>
    </div>
@endsection