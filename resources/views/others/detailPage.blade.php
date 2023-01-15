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
                    <form action="{{ route('updateDetailPage', ['words' => $articles->title, 'locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <label for="image">Add Cover Image</label>
                        <input type="file" id="image" name="image">
                        <br><br>
                        <label for="languageTitle">Add <strong>{{app()->getLocale()}}</strong> Title</label>
                        <input type="text" id="languageTitle" name="languageTitle">
                        <br><br>
                        <textarea class="description" id="sectionContent" name="description">

                            {!! $articles->article_content !!}

                    </textarea>
                        <button type="submit" id="updateArticle" name="updateArticle" value="Upload">Save</button>
                    </form>
                </div>
            </div>
        @endauth
        <div x-data class="project-detail-card">
            <?php $title = str_replace("-", " ", $articles->title) ?>
            <h3>
                {!! ucwords($title) !!}
            </h3>
            @auth
                <a @click="alert('Are you sure you want to delete this?')" href="{{ route('deleteOthersArticle', ['article' => $articles->title, 'locale' => app()->getLocale() ] )  }}" ><button class="delete-item">Delete</button></a>
            @endauth
        </div>
        <div class="text-box">
            {!! $articles->article_content !!}
        </div>
        <br>
        @if($articles->article_image)
            <img src="{{ asset('storage/' . $articles->article_image) }}" alt="Others">
        @endif
    </div>
@endsection
