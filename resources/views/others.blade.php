@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, others, autres, anderen
@endsection

@section('title')
    Anderen
@endsection

@section('contact')
    @auth
        <div class="editSection w3-display-container">
            <input class="toggle-box" id="header1" type="checkbox" >
            <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>
            <div class="addSection">
                <form action="{{ route('updateOthers', ['locale' => app()->getLocale()] ) }}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <h3>Updating current article</h3>

                    <br>
                    <textarea class="description" id="sectionContent" name="description">

                        @foreach ($articles as $article)
                            {{ $article->article_content }}
                        @endforeach

                    </textarea>
                    <hr >
                    <br>
                    <h3>Creating new detail page</h3>
                    <br>
                    <label for="newArticle">Title of the new article: </label>
                    <input type="text" id="newArticle" name="newArticle" style="border: 1px solid black; padding-left: 5px;">
                    <br>

                    <button type="submit" id="updateArticle" name="updateArticle" value="Upload" style="margin-top: 10px; padding: 10px;">Save</button>
                </form>
            </div>
        </div>
    @endauth
<div class="fluid intro" style="width: 650px;">
        @foreach ($articles as $article)
            {!! $article->article_content !!}
            <br>
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="Others">
            @endif
        @endforeach
    </div>
@endsection
