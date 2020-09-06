@component('mail::message')
Reset Account Password
Welcome {{ $data['data']->name }}
The body of your message.

@component('mail::button', ['url' => url('/')."/admin/reset/password/".$data['token']])
Click here to reset your password
@endcomponent
or copy link
<a href="{{ url('/')."/admin/reset/password/".$data['token'] }}">{{ "reset/password/".$data['token'] }}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
