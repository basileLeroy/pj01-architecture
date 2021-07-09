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
            <form action="{{ route('shop', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data">
            {{ csrf_field() }}
                <label for="bookTitle">Book title </label>
                <input type="text" id="sectionTitle" name="bookTitle" placeholder=" (example: My Book title)">
                <label for="author">Author </label>
                <input type="text" id="sectionTitle" name="author" placeholder=" (example: Annie M.G. Schmidt)">
                <label for="bookIntro">Intro text </label>
                <textarea class="bookIntro" id="sectionInput" name="bookIntro"></textarea>
                <label for="price">Price </label>
                <input type="text" id="sectionTitle" name="price" placeholder=" (example: 36.00)">
                <label for="published">Published at  </label>
                <input type="date" id="sectionTitle" name="published">
                <label for="publisher">Publisher </label>
                <input type="text" id="sectionTitle" name="publisher" placeholder=" (example: Van Dale Uitgeverij)">
                <br>
                <label for="bookCover">Book cover: </label>
                <input type="file" id="bookCover" name="bookCover">
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Upload new product</button>
            </form>
        </div>

    </div>
    @endauth
    <div class="fluid book">
        @foreach ($products as $product)
                <a href="{{ route('product-title', ['product' => $product->title, 'locale' => app()->getLocale() ] ) }}" class="fullsizable">
                    <div class="book-container">
                        <div class="book-cover">
                            <img src="{{url('/images/architectuur/products/' . $product->cover)}}" alt="blank book cover">
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