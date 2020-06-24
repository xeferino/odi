@component('mail::message')
@component('mail::table')
| Nombre        | Correo electrónico    | Telefono | Mensaje                           |
| -------------:|:---------------------:|:--------:|:--------------------------------- |
| {{ $contact['name'] }} | {{ $contact['email'] }} | {{ $contact['phone'] }} | {{ $contact['message'] }} |
@endcomponent
{{ config('app.name') }}
@endcomponent