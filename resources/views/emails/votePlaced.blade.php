@component('mail::message')
# Vote Placed Successfully

Hello,

Thank you for placing your votes. Here are the details:

@foreach($votes as $vote)
- {{ $vote->post->name }}: {{ $vote->candidate->name }}
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
