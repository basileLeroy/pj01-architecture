@extends('layout')
@extends('header')

@section('title')
    {{ $products->title }}
@endsection

@section('content')
    <div class="content">
        @auth
            <div class="editSection w3-display-container">
                <input class="toggle-box" id="header1" type="checkbox" >
                <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

                <div class="addSection" style="width:170%;">
                    <form action="{{ route('updateProductDetailPage', ['product' => $products->title, 'locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="languageTitle">Book title</label>
                        <input type="text" id="sectionTitle" name="languageTitle" placeholder=" (example: My Book title)">
                        <label for="author">Author </label>
                        <input type="text" id="sectionTitle" name="author" placeholder=" (example: Annie M.G. Schmidt)">
                        <label for="description">Intro text </label>
                        <textarea class="description" id="sectionInput" name="description">{!! $products->article_content !!}</textarea>
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
        @endauth
        <div x-data class="project-detail-card">
            <?php $title = str_replace("-", " ", $products->title) ?>
            <h3>
                {!! ucwords($title) !!}
            </h3>
            @auth
                <a @click="alert('Are you sure you want to delete this?')" href="{{ route('deleteProduct', ['product' => $products->title, 'locale' => app()->getLocale() ] )  }}">
                    <button class="delete-item">Delete</button>
                </a>
            @endauth
            <img alt="{{ucwords($title)}}" title="{{ ucwords($title) }}" src="{{ asset('storage/' . $products->image) }}">

            <a href="{{ $products->url }}" class="orderHere">
                <button>{!! __('pagination.OrderNow') !!}</button>
            </a>
            <a class="thoughts" href="{{ route('contact', ['locale' => app()->getLocale()]) }}">
                <button>{!! __('pagination.thoughts') !!}</button>
            </a>
        </div>
        <div class="book">
            <h1>{{ $products->language_title }}</h1>
            <h3>{!! __('pagination.WrittenBy') !!} - <b>{{ $products->author }}</b></h3>
            <p>{!! $products->article_content !!}</p>
        </div>
    </div>
@endsection
