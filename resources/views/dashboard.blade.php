@extends('events.index')

@section('title', 'Hello Welcome')

@section('style')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .nav-links a, .logout-btn {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .logout-btn {
            background: #dc3545;
            border: none;
            cursor: pointer;
        }
        .nav-links a:hover {
            background: #0056b3;
        }
        .logout-btn:hover {
            background: #c82333;
        }
        .message {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2>Welcome to Your Dashboard</h2>
        
        <div class="nav-links">
            <a href="{{ route('profile.edit') }}">Profile</a>
            <a href="{{ route('events.index') }}">Events</a>
            
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <p class="message">{{ __("You're logged in!") }}</p>
    </div>
@endsection
