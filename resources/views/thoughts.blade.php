@extends('layout')
@extends('header')

@section('title')
    Gedachten
@endsection

@section('contact')
<div class="fluid intro" style="width: 650px;">
        {!! __('thoughts.title') !!}
        <br><br>
        {!! __('thoughts.article') !!}
    </div>
@endsection