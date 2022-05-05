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
                    <label for="image">Add Image</label>
                    <input type="file" id="image" name="image">
                    <br>
                    <textarea class="description" id="sectionContent" name="description">

                        @foreach ($articles as $article)
                            {{ $article->article_content }}
                        @endforeach

                    </textarea>
                    <button type="submit" id="updateArticle" name="updateArticle" value="Upload">Save</button>
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
