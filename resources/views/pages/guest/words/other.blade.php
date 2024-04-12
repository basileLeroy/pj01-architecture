@extends('layout')

@section('seo')
    belderbos, marc, architecturer, others, autres, anderen
@endsection

@section('title')
    Anderen
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {!! $primary->content ?? "No content" !!}

            <br>
            <hr>
        </div>

        <div class="card-group">
            @if($articles->isEmpty())
                {{"No content available yet ..."}}
            @else
                @foreach ($articles as $article)
                    <div class="project-card">
                        <a href="{{ route('words.show-' . app()->getLocale(), ['Word' => $article->slug] )  }}" class="fullsizable">
                            <img alt="{{ $article->title }}" title="{{ $article->title }}" src="{{ asset($article->image)}}">
                            <p>{{ ucwords($article->title) }}</p>
                        </a>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
