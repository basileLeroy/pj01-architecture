@extends('layout')
@extends('header')

@section('title')
    {{ $book->title }}
@endsection

@section('book')
    @auth
    <div class="editSection w3-display-container">
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

        <div class="addSection">
            <form action="{{ route('architectuur', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data">
            {{ csrf_field() }}
                <label for="projectTitle">Project title: </label>
                <input type="text" id="sectionTitle" name="projectTitle" placeholder=" (example: 1978-Reel-Boom)">
                <label for="projectCover">Cover image: </label>
                <input type="file" id="sectionCover" name="projectCover">
                <br>
                <label for="projectGallery">Gallery images: </label>
                <input type="file" id="sectionGallery" name="projectGallery[]" multiple>
                <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Upload new project</button>
            </form>
        </div>

    </div>
    @endauth
    <div class="fluid book">
        <div class="book-container">
            <div class="book-cover">
                <img src="{{url('/images/architectuur/' . $book->cover)}}" alt="blank book cover">
            </div>
            <div class="book-context">
                <h1>{{ $book->title }} <span class="author">- {{ $book->author }}</span></h1>
                <p>{{ $book->about }}</p>
                <span class="price">{{ $book->currency . " " . $book->price }}</span>
            </div>
        </div>
        <a href="{{ route('order-product', ['product' => $book->title, 'locale' => app()->getLocale() ] ) }}" class="orderHere"><button>{!! __('pagination.OrderNow') !!}</button></a>
    </div>
@endsection