<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <nav class="mb-4">
            @auth
                <span>Welcome, {{ Auth::user()->name }}!</span>
                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-primary">Tasks</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-secondary">Register</a>
            @endauth
        </nav>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
