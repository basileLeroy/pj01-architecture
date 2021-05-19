@extends('layout')
@extends('header')

@section('title')
    Home
@endsection

@section('landing')
    <div class="fluid intro">
        <img src="{{url('/images/home/allessandro.jpg')}}" title="Les ordres - Alessandro Anselmi" alt="Allessandro Anselmi">
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1">Les ordres - Alessandro Anselmi</label>
        <div class="article">
            {!! __('landing.article') !!}
        </div>
    </div>
@endsection