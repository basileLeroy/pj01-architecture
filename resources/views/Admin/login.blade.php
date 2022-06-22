@extends('layout')
@section('header')
    <li><a href="{{ route('home', ['locale' => app()->getLocale()] ) }}">Back</a></li>
@endsection

@section('title')
    Admin
@endsection

@section('content')
<div class="login-card">
    <h1 class="form-heading">Admin Login</h1>
    <div class="login-form">
        <div class="panel">
            <p>Please enter your email and password</p>
        </div>
        <form id="Login" method="POST" action="{{ route('checkAuth', ['locale' => app()->getLocale()] ) }}">
        {{ csrf_field() }}
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <div class="forgot">
                <a href="reset.html">Forgot password?</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
@endsection
