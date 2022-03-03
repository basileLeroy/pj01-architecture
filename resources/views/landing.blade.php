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

@section('landing')
    <div class="fluid intro">
        <img src="{{url('/images/home/allessandro.jpg')}}" title="Les ordres - Alessandro Anselmi" alt="Allessandro Anselmi">
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1">Les ordres - Alessandro Anselmi</label>
        <div class="article w3-display-container">
            @auth
            <div class="editSection w3-display-container">
                <i class="fa fa-edit w3-xxlarge"></i>
                <div class="addSection">
                    <form action="{{ route('home', ['locale' => app()->getLocale()] ) }}" method="POST">
                    {{ csrf_field() }}
                        <textarea class="description" id="sectionContent" name="description">
                            @foreach ($articles as $article)
                                {{ $article->article_content }}
                            @endforeach
                        </textarea>
                        <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Save</button>
                    </form>
                </div>
            </div>
            @endauth

            @foreach ($articles as $article)
                <?= $article->article_content ?>
            @endforeach

        </div>
    </div>
@endsection
