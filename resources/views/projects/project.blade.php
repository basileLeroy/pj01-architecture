@extends('layout')
@extends('header')

@section('title')
    Project
@endsection

@section('project')
<div class="project-gallery">
    <div class="fluid projects">
        <div class="project-card">
            <?php 
            $title = str_replace("-", " ", $project)
            ?>
            <h1>{{ucwords($title)}}</h1>
            <img alt="{{$project}}" title="{{$project}}" src="{{url('/images/architectuur/icons/'.$project.'.jpg')}}">
        </div>
    </div>

    <div class="fluid intro" style="width: 650px;">

        <div class="gallery">
            
            @foreach(File::glob(public_path('images/architectuur/slider/').$project.'/*') as $path)
                <a href="{{ str_replace(public_path(), '', $path) }}" data-lightbox="roadtrip"><img src="{{ str_replace(public_path(), '', $path) }}" alt=""></a>
            @endforeach

        </div>
        
    </div>
</div>
@endsection