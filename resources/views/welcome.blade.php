<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>

    <nav>
        @guest
            <a href="{{ route('admin.login') }}">Login as Admin</a>
        @else
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        @endguest
    </nav>

    <div class="form-container ">
        <h1>Enter your email to vote</h1>

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="success-message" style="color: green">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('submit.email') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <div class="d-flex">
                <input type="email" id="email" name="email" required>
                <button type="submit">Submit</button>
            </div>

        </form>
    </div>


</body></html>
