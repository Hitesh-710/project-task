<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Tasks App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @auth
    <nav class="nav">
        Welcome, {{ auth()->user()->name }} 
        
        <div class="btn-container">
            <a class="btn" href="{{ route('tasks.index') }}">Home</a>
            <a class="btn" href="{{ route('tasks.create') }}">Create Task</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn">Log Out</button>
            </form>
        </div>
    </nav>   
    @else
    <a href="{{ route ('showLogin') }}"><span>Login</span></a> | <a href="{{ route ('register') }}"><span>Register</span></a>
    @endauth
    
    <div class="container">
        <h1>@yield('header', 'Dashboard')</h1>
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
