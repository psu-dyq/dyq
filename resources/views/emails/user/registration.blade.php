@component ('mail::message')
# User Registration

Hi {{ $name }},

Your registration is successful.
Please verify your email:

@component ('mail::button', ['url' => $url])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
