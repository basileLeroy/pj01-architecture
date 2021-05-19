@extends('layout')
@extends('header')

@section('title')
    Intentions
@endsection

@section('intentionsProjects')
    <div class="fluid intro" style="width: 650px;">
        <p>Architecturer.net</p>
        {!! __('intentions.articleProjects') !!}
    </div>
@endsection