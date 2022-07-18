@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, mots, woorden, words
@endsection

@section('title')
    Woorden
@endsection

@section('content')
    @auth
        <div class="editSection w3-display-container">
            <input class="toggle-box" id="header1" type="checkbox" >
            <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>
            <div class="addSection">
                <form action="{{ route('woorden', ['locale' => app()->getLocale()] ) }}" method="POST">
                {{ csrf_field() }}
                    <textarea class="description" id="sectionContent" name="description">

                        @foreach ($introArticles as $article)
                            {{ $article->article_content }}
                        @endforeach

                    </textarea>
                    <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Save</button>
                </form>
            </div>
        </div>
    @endauth
    <div class="fluid intro" style="width: 650px;">
        @foreach ($introArticles as $article)
        <?= $article->article_content ?>
        @endforeach
    </div>

    <ul class="link-group">
        @foreach ($articles as $article)
        <?php $title = str_replace("-", " ", $article->title) ?>
            <li class="link"><a href="{{ route('words-title', ['words' => \Illuminate\Support\Str::slug($article->title), 'locale' => app()->getLocale() ] ) }}">{{ ucwords($title) }}</a></li>
        @endforeach

    </ul>
@endsection
