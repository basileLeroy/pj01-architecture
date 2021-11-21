@component('mail::message')
# Hey, {{ $first_name }}

Thank you for purchasing our products!

## Details:
{{ $product }}


{{ $price }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
