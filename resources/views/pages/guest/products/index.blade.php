@extends("layout")

@section('seo')
belderbos, marc, architecturer, products, projecten, projets, portfolio, achievements, images, gallery
@endsection

@section('title')
    Editions
@endsection

@section('content')
    <div class="content">
        <div class="card-group">
            @forelse ($products as $product)
                <?php $title = str_replace("-", " ", $product->title) ?>
                <div class="project-card">
                    <a href="{{ $product->link }}" class="fullsizable">
                        <img alt="{{ $title }}" title="{{ $title }}" src="{{ asset($product->cover)}}">
                        <p>{{ ucwords($title) }}</p>
                    </a>
                </div>
            @empty
                {!! __('error.no_content') !!}
            @endforelse

        </div>
    </div>
@endsection