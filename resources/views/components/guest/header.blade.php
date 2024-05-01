<div class="logo-container">
    <a href="{{ route('welcome', ['locale' => app()->getLocale()] ) }}" class="desktop fluid logo">
        <img src="{{asset('architecturer_logo.png')}}" alt="Architecturer.net" title="Logo - Architecturer" />
    </a>
    <a href="{{ route('welcome', ['locale' => app()->getLocale()] ) }}" class="mobile fluid logo">
        <img src="{{asset('logo-small.png')}}" alt="Architecturer.net" title="Logo - Architecturer" />
    </a>
</div>

<button class="nav-mobile--button">
    MENU
</button>

<div class="overlay">
    <button class="closebtn nav-close--button">&times;</button>
    <nav class="nav-mobile">
        <div class="lang">
            <ul>
                @foreach (['nl', 'fr', 'en'] as $lang)
                    <li>
                        @if (in_array(substr(Route::CurrentRouteName(), -3), ["-en","-nl","-fr"]))
                            <a href="{{ route(substr(Route::CurrentRouteName(), 0 , -3) . '-' . $lang, array_merge(request()->route()->parameters, ['locale' => $lang])) }}">{{ $lang }}</a>
                        @else
                            <a href="{{ route(Route::CurrentRouteName(), array_merge(request()->route()->parameters, ['locale' => $lang])) }}">{{ $lang }}</a>
                        @endif  
                    </li>
                @endforeach
            </ul>
            <hr>
        </div>

        <button class="accordion">{{ __('nav.intenties')}}</button>
        <ul class="panel">
            <li><a href="{{ route('intentions-' . app()->getLocale()) }}">{{ __('nav.intentiesVanDeSite')}}</a></li>
            <li><a href="{{ route('intentions-project-' . app()->getLocale()) }}">{{ __('nav.intentiesBijEenOntwerp')}}</a></li>
        </ul>

        <a href="{{ route('projects.index') }}">{{ __('nav.architectuur')}}</a>

        <button class="accordion">{{ __('nav.woorden')}}</button>
        <ul class="panel">
            <li><a href="{{ route('words-' . app()->getLocale() ) }}">Marc Belderbos</a></li>
            <li><a href="{{ route('words.other-' . app()->getLocale() ) }}">{{ __('nav.anderen')}}</a></li>
        </ul>

        <button class="accordion">{{ __('nav.ontwerper')}}</button>
        <ul class="panel">
            <li><a href="{{ route('contact-' . app()->getLocale() ) }}">contact</a></li>
            <li><a href="{{ route('biography-' . app()->getLocale() ) }}">{{ __('nav.bio')}}</a></li>
        </ul>

        <a href="{{ route('thoughts-' . app()->getLocale()) }}">{{ __('nav.gedachten')}}</a>

        <a href="{{ route('products.index-' .  app()->getLocale() ) }}">{{ __('nav.shop')}}</a>
</nav>
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
            <li><a href="{{ route('thoughts-' . app()->getLocale()) }}">{{ __('nav.gedachten')}}</a></li>
            <li><a href="{{ route('products.index-' .  app()->getLocale() ) }}">{{ __('nav.shop')}}</a></li>
        </ul>
    </nav>
    <div class="lang">
        <ul>
            @foreach (['nl', 'fr', 'en'] as $lang)
                <li>
                    @if (in_array(substr(Route::CurrentRouteName(), -3), ["-en","-nl","-fr"]))
                        <a href="{{ route(substr(Route::CurrentRouteName(), 0 , -3) . '-' . $lang, array_merge(request()->route()->parameters, ['locale' => $lang])) }}">{{ $lang }}</a>
                    @else
                        <a href="{{ route(Route::CurrentRouteName(), array_merge(request()->route()->parameters, ['locale' => $lang])) }}">{{ $lang }}</a>
                    @endif  
                </li>
            @endforeach
        </ul>
    </div>
</div>
