@extends('layout')
@extends('header')

@section('title')
    Woorden
@endsection

@section('words')
    <div class="fluid intro" style="width: 650px;">
        {!! __('words.article') !!}
    </div>

    <ul class="link-group">
        @foreach ($articles as $article)
        <?php $title = str_replace("-", " ", $article->title) ?>
            <li class="link"><a href="{{ route('words-title', ['words' => $article->title, 'locale' => app()->getLocale() ] ) }}">{{ ucwords($title) }}</a></li>
        @endforeach

    </ul>
@endsection