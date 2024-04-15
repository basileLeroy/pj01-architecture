@extends('layout')

@section('seo')
    belderbos, marc, architecturer, thoughts, gedachten, pansées, reviews, feedback
@endsection

@section('title')
    Thoughts
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {!! $article->content ?? __("error.no_content")  !!}
        </div>

        <a class="thoughts" href="mailto:{{ env('MAIL_ADMIN') }}">
            <button>{!! __('pagination.thoughts') !!}</button>
        </a>
    </div>
@endsection
