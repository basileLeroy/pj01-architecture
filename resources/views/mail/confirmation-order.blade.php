@component('mail::message')
# {{ __('order.greeting')}}{{ $first_name }}

## {{ __('order.thank you message')}}

{{ __('order.order received')}}{{ $date }}

***

{{ __('order.order number')}}`{{ $order_number }}`


### {{ __('order.client details')}}
> {{ $first_name }} {{ $last_name }} <br>
> Tel: {{ $phone }} <br>
> {{ $street }}, {{ $zip }} {{ $city }} <br>
> {{ $region }} - {{ $country }} <br>

@component('mail::table')
| Image | Product        | Price        |
| :---: |:--------------:| ------------:|
| <img src="{{ $bookCover }}" alt="Image not loaded..." style="height:150px;width:auto;"> | {{ $product }} | {{ $price }} |
@endcomponent

{{ __('order.delivery')  }}

{{ __('order.signature')}},<br>
{{ config('app.name') }}
@endcomponent
