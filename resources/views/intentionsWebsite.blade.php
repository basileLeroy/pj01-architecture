@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, intentions, website
@endsection

@section('title')
    Intentions
@endsection

@section('content')
{{--    style width = 650px--}}
    <div class="content">
        @auth
            <div class="editSection w3-display-container">
                <i class="fa fa-edit w3-xxlarge w3-display-topleft"></i>
                <div class="addSection">
                    <form action="{{ route('intenties-van-de-site', ['locale' => app()->getLocale()] ) }}" method="POST">
                        {{ csrf_field() }}
                        <textarea class="description" id="sectionContent" name="description">
                        @foreach ($articles as $article)

                            {!! $article->article_content !!}
                        @endforeach
                    </textarea>
                        <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Save</button>
                    </form>
                </div>
            </div>
        @endauth
        <div class="text-box">
            @foreach ($articles as $article)
                {!! $article->article_content !!}
            @endforeach
        </div>
    </div>
@endsection
