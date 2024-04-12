@extends('layout')

@section('seo')
    belderbos, marc, architecturer, mots, woorden, words
@endsection

@section('title')
    Words
@endsection

@section('content')
<div class="content">
    <div class="text-box">
        {!! $primary->content !!}
    </div>
    <hr>
    <div class="card-group">
    @foreach ($articles as $article)
        <div class="project-card">
            <a href="{{ route('words.show-' . app()->getLocale(), ['Word' => $article->slug] )  }}" class="fullsizable">
                <img alt="{{ $article->title }}" title="{{ $article->title }}" src="{{ asset($article->cover)}}">
                <p>{{ ucwords($article->title) }}</p>
            </a>
        </div>
    @endforeach

    </div>

</div>
@endsection
