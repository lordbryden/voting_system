<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/admindashboard.css') }}" rel="stylesheet">


</head>
<body>
    <div>
        <h1>Admin Dashboard</h1>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <h2>Create Post</h2>
    <form action="{{ route('admin.createPost') }}" method="POST" class="formClass">
        @csrf
        <label for="name">Post Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Create Post</button>
    </form>

    <h2>Posts and Candidates</h2>
    @foreach ($posts as $post)
        <h3>{{ $post->name }}</h3>
        <ul>
            @foreach ($post->candidates as $candidate)
                <li id="candidate_{{ $candidate->id }}">
                    {{ $candidate->name }}
                    <form action="{{ route('candidates.destroy', $candidate) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deleteButton">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        @if ($post->candidates->count() < 4)
            <form action="{{ route('admin.addCandidate', $post->id) }}" method="POST" class="formClass">
                @csrf
                <label for="candidate_name_{{ $post->id }}">Candidate Name:</label>
                <input type="text" id="candidate_name_{{ $post->id }}" name="name" required>
                <button type="submit" class="buttonPadding">Add Candidate</button>
            </form>
        @else
            <p>Maximum of 4 candidates reached.</p>
        @endif
    @endforeach


</body>
</html>
