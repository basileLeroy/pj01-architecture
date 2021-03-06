@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, others, autres, anderen
@endsection

@section('title')
    Anderen
@endsection

@section('content')
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
                    <label for="image">Add Cover Image</label>
                    <input type="file" id="image" name="image">
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
    @endforeach
        <hr>
</div>

    <div class="fluid projects">

        @foreach ($detailPages as $article)

            <div class="project-card">
                <a href="{{ route('otherPages', ['article' => $article->title, 'locale' => app()->getLocale() ] )  }}" class="fullsizable">
                    <img alt="{{ $article->language_title }}" title="{{ $article->language_title }}" src="{{ asset('storage/' . $article->image)}}">
                    <p>{{ ucwords($article->language_title) }}</p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
