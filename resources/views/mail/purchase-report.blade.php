@component('mail::message')
# Nieuwe aankoop geplaatst op Architecturer.net

***

### Product info:
@component('mail::table')
| Order ID            | Product        | Price        | Status        |
|:-------------------:|:--------------:|:------------:|:-------------:|
| {{ $order_number }} | {{ $product }} | {{ $price }} | {{ $status }} |
@endcomponent


### Client info:
> {{ $first_name }} {{ $last_name }} <br>
> Tel: {{ $phone }} <br>
> {{ $street }}, {{ $zip }} {{ $city }} <br>
> {{ $region }} - {{ $country }} <br>

@component('mail::button', ['url' => config('app.url') . ':8000'])
Bevestig dat de bestelling is verzonden naar klant
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
