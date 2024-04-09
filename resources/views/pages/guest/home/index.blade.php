@extends("layout")

@section('seo')
    belderbos, marc, architecturer, home, architecture
@endsection

@section('title')
    Home
@endsection

@section("content")
<div x-data="{ show: false }"  class="content">
    <img src="{{asset('storage/images/home/allessandro.jpg')}}" title="Les ordres - Alessandro Anselmi" alt="Allessandro Anselmi">

    <h1 class="text-show-action" @click="show = !show">{{$article->title}}</h1>

    <div id="point" class="text-box" x-show="show">
        <?= $article->article_content ?>
    </div>
</div>
@endsection