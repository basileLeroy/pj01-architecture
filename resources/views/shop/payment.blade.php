@extends('layout')
@extends('header')

@section('title')
    {{ $book->title }}
@endsection

@section('book')
    @auth
    <div class="editSection w3-display-container">
        <input class="toggle-box" id="header1" type="checkbox" >
        <label for="header1"><i class="fa fa-edit w3-xxlarge w3-display-topleft"></i></label>

        <div class="addSection">
            <form action="{{ route('architectuur', ['locale' => app()->getLocale()] ) }}" method="POST" class="sectionUploader" enctype="multipart/form-data">
            {{ csrf_field() }}
                <label for="projectTitle">Project title: </label>
                <input type="text" id="sectionTitle" name="projectTitle" placeholder=" (example: 1978-Reel-Boom)">
                <label for="projectCover">Cover image: </label>
                <input type="file" id="sectionCover" name="projectCover">
                <br>
                <label for="projectGallery">Gallery images: </label>
                <input type="file" id="sectionGallery" name="projectGallery[]" multiple>
                <button type="submit" id="uploadNewSection" name="uploadNewProject" value="Upload">Upload new project</button>
            </form>
        </div>

    </div>
    @endauth
    <div class="fluid book">

    </div>
@endsection