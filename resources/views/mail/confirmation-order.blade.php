@component('mail::message')
# {{ __('order.greeting')}}{{ $first_name }}

{{ __('order.order received')}}

{{ __('order.order number')}}`{{ $order_number }}`

***

## {{ __('order.thank you message')}}

### {{ __('order.client details')}}
> {{ $first_name }} {{ $last_name }} <br>
> Tel: {{ $phone }} <br>
> {{ $street }}, {{ $zip }} {{ $city }} <br>
> {{ $region }} - {{ $country }} <br>


@component('mail::table')
| Image | Product        | Price        |
| ----- |:--------------:| ------------:|
| image | {{ $product }} | {{ $price }} |
@endcomponent

{{ __('order.signature')}},<br>
{{ config('app.name') }}
@endcomponent
