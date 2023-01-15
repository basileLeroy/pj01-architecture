@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, thoughts, gedachten, pansées, reviews, feedback
@endsection

@section('title')
    Gedachten
@endsection

@section('content')
    <div class="content">
        @auth
            <div class="editSection w3-display-container">
                <input class="toggle-box" id="header1" type="checkbox" >
                <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>
                <div class="addSection">
                    <form action="{{ route('gedachten', ['locale' => app()->getLocale()] ) }}" method="POST">
                        {{ csrf_field() }}
                        <textarea class="description" id="sectionContent" name="description">

                        @foreach ($articles as $article)
                                {{ $article->article_content }}
                            @endforeach

                    </textarea>
                        <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Save</button>
                    </form>
                </div>
            </div>
        @endauth

        <div class="text-box">
            @foreach ($articles as $article)
                <?= $article->article_content ?>
            @endforeach
        </div>

        <a class="thoughts" href="mailto:{{ env('MAIL_ADMIN') }}">
            <button>{!! __('pagination.thoughts') !!}</button>
        </a>
    </div>
@endsection
