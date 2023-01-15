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
    <div x-data="{ show: false }" class="content">
        <img src="{{url('/images/home/allessandro.jpg')}}" title="Les ordres - Alessandro Anselmi" alt="Allessandro Anselmi">

        <h1 class="text-show-action" @click="show = !show">{{$article->title}}</h1>

        @auth
            <div class="editSection w3-display-container" x-show="show">
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

        <div class="text-box" x-show="show">
            <?= $article->article_content ?>
        </div>
    </div>
@endsection
