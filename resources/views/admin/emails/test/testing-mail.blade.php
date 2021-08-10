@component('mail::message')
# {{ $details['title'] }}

<h5> {{ $details['subject'] }} </h5>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
