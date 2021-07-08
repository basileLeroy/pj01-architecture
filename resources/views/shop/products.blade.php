@extends('layout')
@extends('header')

@section('title')
    Products
@endsection

@section('shop')
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
        @foreach ($products as $product)
                <a href="{{ route('product-title', ['product' => $product->title, 'locale' => app()->getLocale() ] ) }}" class="fullsizable">
                    <div class="book-container">
                        <div class="book-cover">
                            <img src="{{url('/images/architectuur/' . $product->cover)}}" alt="blank book cover">
                        </div>
                        <div class="book-context">
                            <h1>{{ $product->title }} <span class="author">- {{ $product->author }}</span></h1>
                            <p>{{ $product->about }}</p>
                            <span class="price">{{ $product->currency . " " . $product->price }}</span>
                        </div>
                    </div>
                </a>
                
        @endforeach
    </div>
@endsection