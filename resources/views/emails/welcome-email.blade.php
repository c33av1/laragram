@component('mail::message')
# Welcome to LaraGram

This is a community of fellow developers and we love that you joined us!

@component('mail::button', ['url' => '/'])
Start Browsing Now!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent