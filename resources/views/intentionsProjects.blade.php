@extends('layout')
@extends('header')

@section('title')
    Intentions
@endsection

@section('intentionsProjects')
    <div class="fluid intro" style="width: 650px;">
        @auth
            <div class="editSection w3-display-container">
                <i class="fa fa-edit w3-xxlarge"></i>
                <div class="addSection">
                    <form action="{{ route('intenties-bij-een-ontwerp', ['locale' => app()->getLocale()] ) }}" method="POST">
                    {{ csrf_field() }}
                        <textarea class="description" id="sectionContent" name="description">
                            @foreach ($articles as $article)
                                <?= $article->article_content ?>
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
@endsection