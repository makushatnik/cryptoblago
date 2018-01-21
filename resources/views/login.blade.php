@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="auth">
            <div class="title m-b-md">
                Login
            </div>

            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        
            <div class="login-form">
                <form action="/login" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">Имя пользователя</label>
                        <input type="text" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>

                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection