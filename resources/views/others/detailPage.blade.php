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
                <form action="{{ route('updateDetailPage', ['article' => $articles->title, 'locale' => app()->getLocale()] ) }}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <label for="image">Add Cover Image</label>
                    <input type="file" id="image" name="image">
                    <br>
                    <textarea class="description" id="sectionContent" name="description">

                            {!! $articles->article_content !!}

                    </textarea>
                    <button type="submit" id="updateArticle" name="updateArticle" value="Upload">Save</button>
                </form>
            </div>
        </div>
    @endauth
    <div class="fluid intro" style="width: 650px;">
            {!! $articles->article_content !!}
            <br>
            @if($articles->image)
                <img src="{{ asset('storage/' . $articles->image) }}" alt="Others">
            @endif
    </div>
@endsection
