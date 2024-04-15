@extends('layout')

@section('seo')
belderbos, marc, architecturer, words, woorden, mots
@endsection

@section('title')
    Mots
@endsection

@section('content')
    <div class="content">
        <div x-data class="project-detail-card">
            <h3>
                {!! ucwords($article->title) !!}
            </h3>
            <br>
            @if($article->cover)
                <img src="{{ asset($article->cover) }}" alt="cover picture of {{$article->title}}">
            @endif
        </div>
        <div class="text-box">
            {!! $article->content  ?? __('error.no_content') !!}
        </div>
    </div>
@endsection