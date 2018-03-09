@extends('layouts.master')

@section('title', 'Login')


@section('content')

    <form action="{{ route('login') }}" method="POST" class="form-signin">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Login with your credentials</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username"
               required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
               required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

@endsection
