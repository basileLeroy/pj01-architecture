@section('header')
    <div class="logo-container">
        <a href="{{ route('home', ['locale' => app()->getLocale()] ) }}" class=" fluid logo">
            <img src="{{url('/images/architecturer_logo.png')}}" alt="Architecturer.net" title="Logo - Architecturer" />
        </a>
    </div>
    <div class="nav-desktop">
        <nav>
            <ul class="primary-navigation">
                <li><a href="{{ route('intenties-van-de-site', ['locale' => app()->getLocale()] ) }}">{{ __('nav.intenties')}}</a>
                    <ul class="secondary-navigation">
                        <li><a href="{{ route('intenties-van-de-site', ['locale' => app()->getLocale()] ) }}">{{ __('nav.intentiesVanDeSite')}}</a></li>
                        <li><a href="{{ route('intenties-bij-een-ontwerp', ['locale' => app()->getLocale()] ) }}">{{ __('nav.intentiesBijEenOntwerp')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('architectuur', ['locale' => app()->getLocale()] ) }}">{{ __('nav.architectuur')}}</a></li>
                <li><a href="{{ route('woorden', ['locale' => app()->getLocale()] ) }}">{{ __('nav.woorden')}}</a>
                    <ul class="secondary-navigation">
                        <li><a href="{{ route('woorden', ['locale' => app()->getLocale()] ) }}">Marc Belderbos</a></li>
                        <li><a href="{{ route('anderen', ['locale' => app()->getLocale()] ) }}">{{ __('nav.anderen')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('biografie', ['locale' => app()->getLocale()] ) }}">{{ __('nav.ontwerper')}}</a>
                    <ul class="secondary-navigation">
                        <li><a href="{{ route('contact', ['locale' => app()->getLocale()] ) }}">contact</a></li>
                        <li><a href="{{ route('biografie', ['locale' => app()->getLocale()] ) }}">{{ __('nav.bio')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('gedachten', ['locale' => app()->getLocale()] ) }}">{{ __('nav.gedachten')}}</a></li>
                <li><a href="{{ route('shop', ['locale' => app()->getLocale()] ) }}">{{ __('nav.shop')}}</a></li>
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
    <div class="nav-mobile" x-data="{ open: false }">
        <button class="mobile-menu" @click="open = !open">
            MENU
        </button>
        <nav>
            <ul class="primary-navigation" x-show="open">
                <li><a href="{{ route('intenties-van-de-site', ['locale' => app()->getLocale()] ) }}">{{ __('nav.intenties')}}</a>
                    <ul class="secondary-navigation">
                        <li><a href="{{ route('intenties-van-de-site', ['locale' => app()->getLocale()] ) }}">{{ __('nav.intentiesVanDeSite')}}</a></li>
                        <li><a href="{{ route('intenties-bij-een-ontwerp', ['locale' => app()->getLocale()] ) }}">{{ __('nav.intentiesBijEenOntwerp')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('architectuur', ['locale' => app()->getLocale()] ) }}">{{ __('nav.architectuur')}}</a></li>
                <li><a href="{{ route('woorden', ['locale' => app()->getLocale()] ) }}">{{ __('nav.woorden')}}</a>
                    <ul class="secondary-navigation">
                        <li><a href="{{ route('woorden', ['locale' => app()->getLocale()] ) }}">Marc Belderbos</a></li>
                        <li><a href="{{ route('anderen', ['locale' => app()->getLocale()] ) }}">{{ __('nav.anderen')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('biografie', ['locale' => app()->getLocale()] ) }}">{{ __('nav.ontwerper')}}</a>
                    <ul class="secondary-navigation">
                        <li><a href="{{ route('contact', ['locale' => app()->getLocale()] ) }}">contact</a></li>
                        <li><a href="{{ route('biografie', ['locale' => app()->getLocale()] ) }}">{{ __('nav.bio')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('gedachten', ['locale' => app()->getLocale()] ) }}">{{ __('nav.gedachten')}}</a></li>
                <li><a href="{{ route('shop', ['locale' => app()->getLocale()] ) }}">{{ __('nav.shop')}}</a></li>
            </ul>
        </nav>
        <div class="lang" x-show="open">
            <ul>
                @foreach (['nl', 'fr', 'en'] as $lang)
                    <li>
                        <a href="{{ route(Route::CurrentRouteName(), array_merge(request()->route()->parameters, ['locale' => $lang])) }}">{{ $lang }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
