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
        
        <form action="{{ route('mollie.payment', ['locale' => app()->getLocale() ] ) }}" method="POST" class="">
        {{ csrf_field() }}

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

        <div class="payment-form">

            <div class="form-section">
                <div class="title">
                    <label class="order-form-label">Name</label>
                </div>
                <div class="double-input">
                    <input class="order-form-input" name="firstName" required placeholder="First">
                    <input class="order-form-input" name="lastName" required placeholder="Last">
                </div>
            </div>
            <div class="form-section">
                <div class="title">
                    <label class="order-form-label">Email - Phone</label>
                </div>
                <div class="single-input">
                    <input class="order-form-input" type="email" name="email" required placeholder="Email">
                </div>
                <div class="single-input">
                    <input class="order-form-input" name="phone" required placeholder="Phone">
                </div>
            </div>
            <div class="form-section">
                <div class="title">
                    <label class="order-form-label">Adress</label>
                </div>
                <div class="single-input">
                    <input class="order-form-input" name="street" required placeholder="Street Address">
                </div>
                <div class="double-input">
                    <input class="order-form-input" name="city" required placeholder="City">
                    <input class="order-form-input" name="region" placeholder="Region">
                </div>
                <div class="double-input">
                    <input class="order-form-input" type="number" name="postal" required placeholder="Postal / Zip Code">
                    <input class="order-form-input" name="country" required placeholder="Country">
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">{!! __('pagination.ConfirmOrder') !!}</button>
        </div>
        </form>
    </div>
@endsection