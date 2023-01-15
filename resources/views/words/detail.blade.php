@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, words, woorden, mots
@endsection

@section('title')
    Mots
@endsection

@section('content')
   <div class="content">
       @auth
           <div class="editSection w3-display-container">
               <input class="toggle-box" id="header1" type="checkbox" >
               <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>
               <div class="addSection">
                   <form action="{{ route('updateDetailPage', ['words' => $articles->title, 'locale' => app()->getLocale()] ) }}" method="POST" enctype="multipart/form-data" >
                       {{ csrf_field() }}
                       <label for="image">Add Cover Image</label>
                       <input type="file" id="image" name="image">
                       <br><br>
                       <label for="languageTitle">Add <strong>{{app()->getLocale()}}</strong> Title</label>
                       <input type="text" id="languageTitle" name="languageTitle" style="border: 1px solid black; padding-left: 5px;">
                       <br><br>
                       <textarea class="description" id="sectionContent" name="description">

                            {!! $articles->article_content !!}

                    </textarea>
                       <button type="submit" id="updateArticle" name="updateArticle" value="Upload" style="padding: 10px; margin-top: 5px">Save</button>
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
               <a @click="alert('Are you sure you want to delete this?')" href="{{ route('deleteWordsArticle', ['words' => $articles->title, 'locale' => app()->getLocale() ] )  }}"><button class="delete-item">Delete</button></a>
           @endauth
           <br>
           @if($articles->article_image)
               <img src="{{ asset('storage/' . $articles->article_image) }}" alt="Others">
           @endif
       </div>

       {!! $articles->article_content !!}
   </div>
@endsection
