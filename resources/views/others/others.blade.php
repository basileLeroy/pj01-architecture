@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, others, autres, anderen
@endsection

@section('title')
    Anderen
@endsection

@section('content')
    <div class="content">
        @auth
            <div class="editSection w3-display-container">
                <i class="fa fa-edit w3-xxlarge w3-display-topleft"></i>
                <div class="addSection">
                    <form action="{{ route('updateOthers', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <hr>
                        <h3>Update Introduction Text:</h3>

                        <textarea class="description" id="sectionContent" name="description">

                        @foreach ($articles as $article)
                                {{ $article->article_content }}
                            @endforeach

                    </textarea>

                        <hr>
                        <h3>Add New Article:</h3>

                        <label for="newArticle">Title of the new article: </label>
                        <input type="text" id="newArticle" name="newArticle">
                        <br>
                        <label for="image">Add Cover Image</label>
                        <input type="file" id="image" name="image">
                        <br>
                        <button type="submit" id="updateArticle" name="updateArticle" value="Upload">Save</button>
                    </form>
                </div>
            </div>
        @endauth
        <div x-data class="project-detail-card">
            @foreach ($articles as $article)
                {!! $article->article_content !!}
                <br>
            @endforeach
            <hr>
            @foreach ($detailPages as $article)
                <div class="project-card">
                    <a href="{{ route('otherPages', ['article' => $article->title, 'locale' => app()->getLocale() ] )  }}" class="fullsizable">
                        <img alt="{{ $article->language_title }}" title="{{ $article->language_title }}" src="{{ asset('storage/' . $article->image)}}">
                        <p>{{ ucwords($article->language_title) }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
