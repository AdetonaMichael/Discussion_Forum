@component('mail::message')
Welcome To Geo-Discuss,

@component('mail::button', ['url' => ''])
Continue To Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
