@extends('layout')
@extends('header')

@section('title')
    Woorden
@endsection

@section('words01')
    <div class="fluid intro" style="width: 650px;">
        {!! __('words.title1') !!}
        <br/><br/>
        {!! __('words.text1') !!}
    </div>

@endsection