@section('flash')
@if (session()->has('success'))
    <div x-data="{ show: true}" 
        class="flashMessage"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
@endsection