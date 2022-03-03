@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, words, woorden, mots
@endsection

@section('title')
    Woorden
@endsection

@section('words01')
    @auth
        <div class="editSection w3-display-container">
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>
            <div class="addSection">
                <form action="{{ route('intenties-bij-een-ontwerp', ['locale' => app()->getLocale()] ) }}" method="POST">
                {{ csrf_field() }}
                    <textarea class="description" id="sectionContent" name="description">

                            {{ $article->article_content }}

                    </textarea>
                    <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Save</button>
                </form>
            </div>
        </div>
    @endauth
    <div class="fluid intro" style="width: 650px;">

        <h2>
        <?php $title = str_replace("-", " ", $article->title) ?>
            {{ ucwords($title) }}
        </h2>

        <br><br>

        {{ $article->article_content }}

    </div>
    <div class="fluid book" style="margin-top:50px">
        <a class="thoughts" href="mailto:{{ env('MAIL_ADMIN') }}"><button>{!! __('pagination.thoughts') !!}</button></a>
    </div>

@endsection
