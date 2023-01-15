@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, architecturer, shop, products, books, book, uitgeverij, edition
@endsection

@section('title')
    {{ __('nav.shop') }}
@endsection

@section('content')
    <div class="content">
        @auth
            <div class="editSection w3-display-container">
                <input class="toggle-box" id="header1" type="checkbox" >
                <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

                <div class="addSection">
                    <form action="{{ route('updateProducts', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <hr>
                        <h3>Update Introduction Text:</h3>

                        <label for="description">About these books</label>
                        <textarea class="description" id="description" name="description"></textarea>

                        <hr>
                        <h3>Add New Book:</h3>

                        <label for="bookTitle">Book title </label>
                        <input type="text" id="sectionTitle" name="bookTitle" placeholder=" (example: My Book title)">
                        <label for="author">Author </label>
                        <input type="text" id="sectionTitle" name="author" placeholder=" (example: Annie M.G. Schmidt)">
                        <label for="bookInfo">Intro text </label>
                        <textarea class="bookInfo" id="sectionInput" name="bookInfo"></textarea>
                        <label for="url">URL </label>
                        <input type="text" id="sectionTitle" name="url" placeholder=" (example: https://www.amazon.com/your-product)">
                        <label for="published">Published at  </label>
                        <input type="date" id="sectionTitle" name="published">
                        <label for="publisher">Publisher </label>
                        <input type="text" id="sectionTitle" name="publisher" placeholder=" (example: Van Dale Uitgeverij)">
                        <br>
                        <label for="image">Book cover: </label>
                        <input type="file" id="image" name="image">
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
        @foreach ($products as $product)
            {!! $product->article_content !!}
            <br>
        @endforeach
        <hr>
        @foreach ($detailPages as $product)
            <div class="project-card" >
                <a href="{{ route('productDetailPage', ['product' => $product->title, 'locale' => app()->getLocale() ] )  }}" class="fullsizable">
                    <img alt="{{ $product->language_title }}" title="{{ $product->language_title }}" src="{{ asset('storage/' . $product->image)}}">
                    <p>{{ ucwords($product->language_title) }}</p>
                </a>
            </div>
        @endforeach

        @if(count($products) === 0)
            <p>{{ __('products.notFound') }}</p>
        @endif
    </div>
@endsection
