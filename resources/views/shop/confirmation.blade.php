@extends('layout')

@section('title')
    {{ "confirmation" }}
@endsection

@section('landing')
    <div class="fluid book" style="position: absolute; align-items: center">
        <h3>Een mail is verstuurd aan de klant dat het pakket is verzonden.</h3>
        <a href="{{ route('home', ['locale' => app()->getLocale()] ) }}" class=" fluid logo">-> Back to website</a>
    </div>
@endsection
