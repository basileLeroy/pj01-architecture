<?php

use GuzzleHttp\Psr7\Uri;
?>
@extends('layout')
@extends('header')

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Home
@endsection

@section('content')
    <div class="fluid intro">
        <img src="{{url('/images/home/allessandro.jpg')}}" title="Les ordres - Alessandro Anselmi" alt="Allessandro Anselmi">
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1">{{$article->title}}</label>
        <div class="article w3-display-container">
            @auth
            <div class="editSection w3-display-container">
                <i class="fa fa-edit w3-xxlarge"></i>
                <div class="addSection">
                    <form action="{{ route('home', ['locale' => app()->getLocale()] ) }}" method="POST">
                    {{ csrf_field() }}
                        <label for="title">New Title: </label>
                        <input type="text" id="title" name="title" placeholder="Your new Title here" value="{{$article->title}}" style="border: 1px solid; padding-left:5px;">
                        <textarea class="description" id="sectionContent" name="description">
                                {{ $article->article_content }}
                        </textarea>
                        <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Save</button>
                    </form>
                </div>
            </div>
            @endauth

            <?= $article->article_content ?>
        </div>
    </div>
@endsection
