@component('mail::message')
Nuevo cliente por aprobar.<br>
Cliente: {{ $client->user->name }} <br>
Correo: {{ $client->user->email }} <br>
Zapatería: {{ $client->company }} <br>
Dirección: {{ $client->address }} <br>
Teléfono: {{ $client->phone }} <br>
Teléfono celular: {{ $client->mobile_phone }} <br>
{{ config('app.name') }}
@endcomponent