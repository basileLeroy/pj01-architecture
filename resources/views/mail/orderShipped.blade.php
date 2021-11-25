@component('mail::message')
# {{ __('order.greeting')}}{{ $first_name }}

{{ __('order.shipped')}}

<br>

***

## <div style="text-align: center;">Order Details - Ord. Nr.: {{ $order_number }}</div>

@component('mail::table')
| Image | Product        | Price        |
| :---: |:--------------:| ------------:|
| <img src="{{ $bookCover }}" alt="Image not loaded..." style="height:150px;width:auto;"> | {{ $product }} | {{ $price }} |
@endcomponent

{{ __('order.signature')}},<br>
{{ config('app.name') }}
@endcomponent
