@extends('layout')
@extends('header')

@section('title')
    Home
@endsection

@section('landing')
    <div class="fluid intro">
        <figure><img src="{{url('/images/architecturer_logo.jpg')}}" alt="Allessandro Anselmi"></figure>
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1">Les ordres - Alessandro Anselmi</label>
    </div>
@endsection