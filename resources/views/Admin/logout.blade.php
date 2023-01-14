{{--@section('logout')--}}
{{--    <div class="admin-logout | admin-logged-in">--}}
{{--        <p>You are logged in as administrator</p>--}}
{{--        <a href="{{ route('logout', ['locale' => app()->getLocale()] ) }}">Log out</a>--}}
{{--    </div>--}}
{{--@endsection--}}
<div class="admin-logout">
    <p>You are logged in as administrator</p>
    <a href="{{ route('logout', ['locale' => app()->getLocale()] ) }}">Log out</a>
</div>
