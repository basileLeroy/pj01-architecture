<div class="logo-container">
    <a href="{{ route('welcome', ['locale' => app()->getLocale()] ) }}" class=" fluid logo">
        <img src="{{asset('architecturer_logo.png')}}" alt="Architecturer.net" title="Logo - Architecturer" />
    </a>
</div>
<div class="nav-desktop">
    <nav>
        <ul class="primary-navigation">
            <li><a href="{{ route('intentions-' . app()->getLocale()) }}">{{ __('nav.intenties')}}</a>
                <ul class="secondary-navigation">
                    <li><a href="{{ route('intentions-' . app()->getLocale()) }}">{{ __('nav.intentiesVanDeSite')}}</a></li>
                    <li><a href="{{ route('intentions-project-' . app()->getLocale()) }}">{{ __('nav.intentiesBijEenOntwerp')}}</a></li>
                </ul>
            </li>
            <li><a href="{{ route('projects.index') }}">{{ __('nav.architectuur')}}</a></li>
            <li><a href="{{ route('words-' . app()->getLocale() ) }}">{{ __('nav.woorden')}}</a>
                <ul class="secondary-navigation">
                    <li><a href="{{ route('words-' . app()->getLocale() ) }}">Marc Belderbos</a></li>
                    <li><a href="{{ route('words.other-' . app()->getLocale() ) }}">{{ __('nav.anderen')}}</a></li>
                </ul>
            </li>
            <li><a href="{{ route('biography-' . app()->getLocale() ) }}">{{ __('nav.ontwerper')}}</a>
                <ul class="secondary-navigation">
                    <li><a href="{{ route('contact-' . app()->getLocale() ) }}">contact</a></li>
                    <li><a href="{{ route('biography-' . app()->getLocale() ) }}">{{ __('nav.bio')}}</a></li>
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
