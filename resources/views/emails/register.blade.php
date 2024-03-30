@component('mail::message')

   <p> Hello, {{$user->name}} <p>

@component('mail::button', ['url' => url('verify/'. $user->remember_token)])
Verify

@endcomponent

<p>Kung May Problema ka Pukpok mo nalang sa ulo mo </p>
<p>Thank You!</p>
{{ config('app.name')}}
@endcomponent
