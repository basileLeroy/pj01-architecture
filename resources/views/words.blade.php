@extends('layout')
@extends('header')

@section('title')
    Woorden
@endsection

@section('words')
    <div class="fluid intro" style="width: 650px;">
        {!! __('words.article') !!}
    </div>

    <ul class="link-group">
        <li class="link"><a href="{{ route('les-lices-de-lactualite-2003', app()->getLocale() ) }}">Les lices de l’actualité 2003</a></li>
        <li class="link"><a href="{{ route('purity-lies-in-the-incompletion-1997', app()->getLocale() ) }}">Purity lies in the incompletion, 1997</a></li>
        <li class="link"><a href="{{ route('la-verite-est-oblique-1993', app()->getLocale() ) }}">La vérité est oblique, 1993</a></li>
        <li class="link"><a href="{{ route('la-raison-de-laugure-1992', app()->getLocale() ) }}">La raison de l’augure, 1992</a></li>
        <li class="link"><a href="{{ route('enonciation-dangoisse-et-dinnocence-1978', app()->getLocale() ) }}">Enonciation d’angoisse et d’innocence, 1978</a></li>
    </ul>
@endsection