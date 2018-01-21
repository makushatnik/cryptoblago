@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="auth">
            <div class="title m-b-md">
                Register
            </div>

            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                @endif
            </div>
        
            <div class="register-form">
                <form action="/register" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">Имя пользователя</label>
                        <input type="text" name="username" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" required />
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Повторите пароль</label>
                        <input type="password" name="password_confirm" required />
                    </div>
                    <div class="form-group">
                        <label for="role">Роль</label>
                        <select name="role">
                            <option value="1" selected>Спонсор</option>
                            <option value="2">Исполнитель</option>
                            <option value="3">Эксперт</option>
                            <option value="4">Клиент</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </div>

                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection