@section('header')
    <div>
        <a href="{{ route('home', app()->getLocale() ) }}" class=" fluid logo">
            <img src="{{url('/images/architecturer_logo.png')}}" alt="Architecturer.net" title="Logo - Architecturer" />
        </a>
    </div>
    <div class="reactive">
        <nav>
            <ul class="fluid nav">
                <li><a href="{{ route('intenties-van-de-site', app()->getLocale() ) }}">{{ __('nav.intenties')}}</a>
                    <ul class="subnav">
                        <li><a href="{{ route('intenties-van-de-site', app()->getLocale() ) }}">{{ __('nav.intentiesVanDeSite')}}</a></li>
                        <li><a href="{{ route('intenties-bij-een-ontwerp', app()->getLocale() ) }}">{{ __('nav.intentiesBijEenOntwerp')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('architectuur', app()->getLocale() ) }}">{{ __('nav.architectuur')}}</a></li>
                <li><a href="{{ route('woorden', app()->getLocale() ) }}">{{ __('nav.woorden')}}</a>
                    <ul class="subnav">
                        <li><a href="{{ route('woorden', app()->getLocale() ) }}">Marc Belderbos</a></li>
                        <li><a href="{{ route('anderen', app()->getLocale() ) }}">{{ __('nav.anderen')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('biografie', app()->getLocale() ) }}">{{ __('nav.ontwerper')}}</a>
                    <ul class="subnav">
                        <li><a href="{{ route('contact', app()->getLocale() ) }}">contact</a></li>
                        <li><a href="{{ route('biografie', app()->getLocale() ) }}">{{ __('nav.bio')}}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('gedachten', app()->getLocale() ) }}">{{ __('nav.gedachten')}}</a></li>
            </ul>
        </nav>
        <div class="lang">
            <ul>
                <li><a href="{{ route(Route::currentRouteName(), 'nl') }}">nl</a></li>
                <li><a href="{{ route(Route::currentRouteName(), 'fr') }}">fr</a></li>
                <li><a href="{{ route(Route::currentRouteName(), 'en') }}">en</a></li>
            </ul>
        </div>
    </div>
@endsection