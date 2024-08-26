@extends("layout")

@section('seo')
belderbos, marc, architecturer, products, projecten, projets, portfolio, achievements, images, gallery
@endsection

@section('title')
    Editions
@endsection

@section('content')
    <div class="content">
        <div class="text-box">
            {!! $primary->description ?? __('error.no_content') !!}

            <br>
            <hr>
        </div>

        <div class="card-group">
            @forelse ($products as $product)
                <?php $title = str_replace("-", " ", $product->title) ?>
                <div class="project-card">
                    <a href="{{ route("products.show-" . $product->language, ["Product" => $product->slug]) }}" class="fullsizable">
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