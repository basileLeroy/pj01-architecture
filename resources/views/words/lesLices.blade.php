@extends('layout')
@extends('header')

@section('title')
    Woorden
@endsection

@section('words02')
    <div class="fluid intro" style="width: 650px;">
        {!! __('words.title2') !!}
        <br/><br/>
        {!! __('words.text2') !!}
    </div>

@endsection