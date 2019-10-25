@component('mail::message')
# User Registration

Hi {{ $name }},

Your registration is successful.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
