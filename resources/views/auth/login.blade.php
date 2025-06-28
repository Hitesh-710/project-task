@extends('tasks.layout')

@section('title', 'Login')
@section('header', 'Login')

@section('content')

    <form class="form login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Email:</label>
        <input class="inp" type="email" name="email" autocomplete="on" required>
    
        <label for="password">Password:</label>
        <input class="inp" type="password" name="password" autocomplete="on" required>
    
        <button class="btn" type="submit">Login</button>
    </form>
    
    @if ($errors->any())
        <div style="color:red; list-style: none;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <p><a href="{{ route('showRegister') }}">Don't have an account? <span>Register</span></a></p>

@endsection
