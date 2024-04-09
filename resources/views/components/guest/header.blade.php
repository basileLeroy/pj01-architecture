<div class="logo-container">
    <a href="{{ route('welcome', ['locale' => app()->getLocale()] ) }}" class=" fluid logo">
        <img src="{{asset('storage/images/architecturer_logo.png')}}" alt="Architecturer.net" title="Logo - Architecturer" />
    </a>
</div>
<div class="nav-desktop">
    <nav>
        <ul class="primary-navigation">
            <li><a href="{{ route('intentions-' . app()->getLocale()) }}">{{ __('nav.intenties')}}</a>
                <ul class="secondary-navigation">
                    <li><a href="{{ route('intentions-' . app()->getLocale()) }}">{{ __('nav.intentiesVanDeSite')}}</a></li>
                    <li><a href="{{ "/" }}">{{ __('nav.intentiesBijEenOntwerp')}}</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="lang">
        <ul>
            @foreach (['nl', 'fr', 'en'] as $lang)
                <li>
                    <a href="{{ route(Route::CurrentRouteName(), array_merge(request()->route()->parameters, ['locale' => $lang])) }}">{{ $lang }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
