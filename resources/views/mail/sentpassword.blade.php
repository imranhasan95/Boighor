@component('mail::message')
# Your new Account Created Successfully

Please check login datails!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Click here to login
@endcomponent

@component('mail::panel')
Your new Password is:{{ $g_pass }}
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Boighor team
@endcomponent
