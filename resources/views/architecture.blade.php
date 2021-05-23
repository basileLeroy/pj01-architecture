@extends('layout')
@extends('header')

@section('title')
    Architecture
@endsection

@section('architecture')
    <div class="fluid projects">
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1978-reel-boom'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1978 Reel Boom" src="#">
                <p>1978 Reel Boom</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1979-cubus-diebach'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/cubus-diebach.jpg')}}">
                <p>1979 Cubus Diebach</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1980-venezia-ponte-academia-1'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/venezia-1.png')}}">
                <p>1980 Venezia Ponte Academia</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1980-venezia-ponte-academia-2'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/venezia-2.jpg')}}">
                <p>1980 Venezia Ponte Academia</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1980-villa-di-plinio-ostia'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/villa-di-plinio.jpg')}}">
                <p>1980 Villa di Plinio - Ostia</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1983-eupen'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/eupen.jpg')}}">
                <p>1983 Eupen</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1987-genval'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/genval-1.jpg')}}">
                <p>1987 Genval</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1990-lovendegem'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/lovendegem.jpg')}}">
                <p>1990 Lovendegem</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1992-astene'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/astene.jpg')}}">
                <p>1992 Astene</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1992-audergem'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/audergem.jpg')}}">
                <p>1992 Audergem</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1992-eynaten'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/eynaten.jpg')}}">
                <p>1992 Eynaten</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1995-oudenburg'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/oudenburg.jpg')}}">
                <p>1995 Oudenburg</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1997-gand'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/gand.jpg')}}">
                <p>1997 Gand</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1998-herne'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/herne.jpg')}}">
                <p>1998-Herne</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '1999-traces-romaines'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/traces-romaines.jpg')}}">
                <p>1999 Traces Romaines</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '2000-nazareth'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/nazareth.jpg')}}">
                <p>2000 Nazareth</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '2001-genval-annex'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/genval-annex.jpg')}}">
                <p>2001 Genval Annex</p>
            </a>
        </div>
        <div class="project-card">
            <a href="{{ route('title', ['project' => '2001-genval-appartments'], app()->getLocale() ) }}" class="fullsizable">
                <img alt="1979 Cubus Diebach" title="1979 Cubus Diebach" src="{{url('/images/architectuur/icons/genval-appartments.jpg')}}">
                <p>2001 Genval Appartments</p>
            </a>
        </div>
    </div>
@endsection