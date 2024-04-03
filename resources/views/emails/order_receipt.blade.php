
@component('mail::message')

  <p> Hello, {{$user->fname}} <p>




<div style="text-align: center;">
   <p>Thanks for purchasing of our product</p>
   <p>Thank You!</p>
</div>

{{ config('app.name')}}
@endcomponent
