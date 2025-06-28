@extends('tasks.layout')

@section('title', "Register")

@section('content')
    
    @section('header', "Register")

    <form class="form" method="POST" action="{{ route ('register') }}">
        @csrf
        <label>Name:</label>
        <input class="inp" type="text" name="name" value="{{ old('name') }}" required>
    
        <label>Email:</label>
        <input class="inp" type="email" name="email" value="{{ old('email') }}" required>
    
        <label>Password:</label>
        <input class="inp" type="password" name="password" required>
    
        <label>Confirm Password:</label>
        <input class="inp" type="password" name="password_confirmation" required>
    
        <button class="btn" type="submit">Register</button>
    </form>
    
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <p><a href="{{ route('showLogin') }}">Already have an account? <span>Login</span></a></p>

@endsection
