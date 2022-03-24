@extends('layout')
@extends('header')

@section('seo')
belderbos, marc, contact, email, phone, adress, architecturer, about
@endsection

@section('title')
    Contact
@endsection

@section('contact')
    @auth
        <div class="editSection w3-display-container">
            <input class="toggle-box" id="header1" type="checkbox" >
            <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

            <div class="addSection">
                <form action="{{ route('contact', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader">
                {{ csrf_field() }}
                    <label for="projectTitle">Adress: </label>
                    <input type="text" required id="sectionTitle" name="adress" placeholder=" Wegstraat, 26">
                    <label for="projectTitle">Region / Postal code: </label>
                    <input type="text" required id="sectionTitle" name="region" placeholder=" 9000, GENT">
                    <label for="projectTitle">Country: </label>
                    <input type="text" required id="sectionTitle" name="country" placeholder=" Belgie">
                    <label for="projectTitle">Phone number: </label>
                    <input type="text" required id="sectionTitle" name="phone" placeholder=" +32 412 34 56 78">
                    <label for="projectTitle">Email: </label>
                    <input type="text" required id="sectionTitle" name="email" placeholder=" example@email.com">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" id="uploadNewSection" name="updateContact" value="Upload">Update new contact info</button>
                </form>
            </div>
        </div>
    @endauth
    <div class="fluid intro" style="width: 650px;">
        <h1>Marc BELDERBOS</h1>
        <br>
        <p>
            {!! $contact->adress !!}
            <br>
            {!! $contact->postal_code !!}
            <br>
            {!! $contact->country !!}
        </p>
        <br>
        <p>{!! $contact->phone !!}</p>
        <br>
        <a class="link" href="mailto:{{ $contact->email }}">{!! $contact->email !!}</a>
    </div>
@endsection
