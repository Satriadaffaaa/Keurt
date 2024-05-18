@extends('Layout.Layout')

@section('content')

<div>
    <h2>Login Here</h2>
    <form>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Insert Username Here"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Insert Password Here"><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Doesn't have account? <a href="{{ route('register') }}">Register here</a></p>
</div>
@endsection