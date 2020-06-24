@component('mail::message')
Nueva orden recibida.<br>

Cliente: {{ $order->user->name }} <br>
Correo: {{ $order->user->email }} <br>
@if($order->user->client)
Telefono: {{ $order->user->mobile_phone }} <br>
@endif
El detalle de la orden es el siguiente:<br>
@component('mail::table')
| Producto       | Talla         | Descripción  | Precio unitario  | Cantidad  | Descuento  | Total  |
| ------------- |:-------------:|:--------:|
@foreach($order->order_products as $order_product)
| {{ $order_product->product->brand->name }} {{ $order_product->product->model }} | {{ $order_product->product->size }} | {{ $order_product->product->description }} | @money($order_product->product->public_price, 'MXN') | {{ $order_product->quantity }} | {{ $order_product->discount }}% | @money($order_product->public_price, 'MXN') |
@endforeach
@endcomponent
Total: @money($order->public_price, 'MXN')<br>
{{ config('app.name') }}
@endcomponent
