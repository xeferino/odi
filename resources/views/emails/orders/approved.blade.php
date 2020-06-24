@component('mail::message')
Estimado {{ $order->user->name }}.<br>
Su orden fue revisada y aprobada.<br>

El detalle de su orden es el siguiente:<br>
@component('mail::table')
| Producto       | Talla         | Descripción  | Precio unitario  | Cantidad  | Descuento  | Total  |
| ------------- |:-------------:|:--------:|
@foreach($order->order_products as $order_product)
| {{ $order_product->product->brand->name }} {{ $order_product->product->model }} | {{ $order_product->product->size }} | {{ $order_product->product->description }} | @money($order_product->product->public_price, 'MXN') | {{ $order_product->quantity }} | {{ $order_product->discount }}% | @money($order_product->public_price, 'MXN') |
@endforeach
@endcomponent
Total: @money($order->public_price, 'MXN')<br>

Gracias,<br>
{{ config('app.name') }}
@endcomponent
