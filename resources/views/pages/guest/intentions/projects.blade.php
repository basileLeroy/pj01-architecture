@extends("layout")

@section('seo')
    belderbos, marc, architecturer, projects, intentions
@endsection

@section('title')
    Intentions
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {!! $article->content ?? __('error.no_content') !!}
        </div>
    </div>
@endsection
