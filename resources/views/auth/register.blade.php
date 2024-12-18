@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form-container {
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
<body>
<div class="container">
    <div class="form-container w-50">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="Username">Username</label>
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Username" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="Email">Email</label>
                <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-control-sm" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-30">Register</button>
            <a href="{{ route('login') }}" class="btn btn-secondary w-30">Login</a>
        </form>
    </div>
</div>
</body>
</html>
@endsection
