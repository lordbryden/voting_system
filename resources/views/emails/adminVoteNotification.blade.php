@component('mail::message')
# New Vote Placed

A new vote has been placed by {{ $email }}. Here are the details:

@foreach($votes as $vote)
- {{ $vote->post->name }}: {{ $vote->candidate->name }}
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
