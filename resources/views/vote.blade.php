<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link href="{{ asset('css/vote.css') }}" rel="stylesheet">

</head>
<body>
    <h1>Vote for Candidates</h1>
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('vote') }}" method="POST">
        @csrf
        @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->name }}</h2>
                @foreach ($post->candidates as $candidate)
                    <label class="candidate">
                        <input type="radio" name="votes[{{ $post->id }}]" value="{{ $candidate->id }}" required>
                        {{ $candidate->name }}
                    </label>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Submit Votes</button>
    </form>
</body>
</html>
