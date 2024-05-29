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
            {!! $primary->content ?? "" !!}

            <br>
            <hr>
        </div>

        <div class="card-group">
            @if($articles->isEmpty())
                {!! __('error.no_content') !!}
            @else
                @foreach ($articles as $article)
                    <div class="project-card">
                        <a href="{{ route('words.show-' . app()->getLocale(), ['Word' => $article->slug] )  }}" class="fullsizable">
                            <img src="{{ asset($article->cover)}}" alt="{{ $article->title }}" title="{{ $article->title }}">
                            <p>{{ ucwords($article->title) }}</p>
                        </a>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection