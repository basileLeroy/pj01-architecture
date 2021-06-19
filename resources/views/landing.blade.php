<?php

use GuzzleHttp\Psr7\Uri;
?>
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
        <div class="article w3-display-container">
            <i class="fa fa-edit w3-xxlarge w3-display-topright"></i>
            <form action="admin/update-landing" method="post">
            {{ csrf_field() }}
                <textarea class="description" name="description">{!! __('landing.article') !!}</textarea>
                <button type="submit" class=" w3-button w3-black">Save</button>
            </form>

            {!! __('landing.article') !!}
        </div>
    </div>
@endsection