@extends('layout')

@section('seo')
belderbos, marc, contact, email, phone, adress, architecturer, about
@endsection

@section('title')
    Contact
@endsection

@section('content')
    <div class="content">
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
