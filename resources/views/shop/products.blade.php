@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, shop, products, books, book, uitgeverij, edition
@endsection

@section('title')
    {{ __('nav.shop') }}
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
                <label for="url">URL </label>
                <input type="text" id="sectionTitle" name="url" placeholder=" (example: https://www.amazon.com/your-product)">
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
    @if(count($products) === 0)
        <p>Ajouter de nouveaux produits en cliquant sur l'icône ci-dessus.</p>
    @endif
    @endauth
    <div class="fluid book">
            @foreach ($products as $product)
                    <a href="{{ $product->url }}" class="fullsizable">
                        <div class="book-container">
                            <div class="book-cover">
                                <img src="{{url('.\images\architectuur\products\\' . $product->cover)}}" alt="blank book cover">
                            </div>
                            <div class="book-context">
                                <h1>{{ $product->title }} <span class="author">- {{ $product->author }}</span></h1>
                                <p>{{ $product->about }}</p>
                            </div>
                        </div>
                    </a>
            @endforeach
        @if(count($products) === 0)
            <p>{{ __('products.notFound') }}</p>
        @endif
    </div>
@endsection
