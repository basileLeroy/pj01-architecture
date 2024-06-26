@extends("layout")

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Home
@endsection

@section("content")
<div x-data="{ show: false }"  class="content">
    <img src="{{asset('allessandro.jpg')}}" title="Les ordres - Alessandro Anselmi" alt="Allessandro Anselmi">

    <h1 class="text-show-action" @click="show = !show">{!! $article->title ?? "" !!}</h1>

    <div id="article-content" class="text-box" x-show="show">
        {!! $article->content ?? __('error.no_content') !!}
    </div>
</div>
@endsection