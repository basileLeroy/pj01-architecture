@extends('layout')

@section('seo')
belderbos, marc, contact, email, phone, adress, architecturer, about
@endsection

@section('title')
    Contact
@endsection

@section('content')
    <div class="content">
        <h1>{!! $contact->first_name !!} {!! strToUpper($contact->last_name) !!}</h1>
        <br>
        <p>
            {!! $contact->address !!}
            <br>
            {!! $contact->zip !!}, {!! $contact->city !!}
            <br>
            {!! $contact->country !!}
        </p>
        <br>
        <p>{!! $contact->phone !!}</p>
        <br>
        <a class="link" href="mailto:{{ $contact->email }}">{!! $contact->email !!}</a>
    </div>

@endsection
