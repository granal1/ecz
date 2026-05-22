@php
    $activeMenu = 'Логин';
@endphp

@extends('main')

@section('content')
    <div class="page">
        <div id="app" class="container">
            <div class="login__wrapper w3-display-middle">

                <div class="w3-card-4">
                    <div class="w3-container w3-light-gray">
                        <h3>Войдите или зарегистрируйтесь
                            <button onclick="location.href='/register'"
                                class="w3-margin-left w3-btn w3-medium w3-padding-small w3-round-large w3-success w3-right-align">Регистрация</button>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form class="w3-container" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="w3-margin-top">
                                <label for="email" class="w3-text-indigo">email</label>

                                <input id="email" type="email"
                                    class="w3-input w3-border w3-sand @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w3-margin-top">
                                <label for="password" class="w3-text-indigo">пароль</label>

                                <input id="password" type="password"
                                    class="w3-input w3-border w3-sand @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w3-margin-top w3-margin-bottom">
                                <button type="submit" class="w3-btn w3-indigo w3-round-large">
                                    Вход
                                </button>
                            </div>
                        </form>
                    </div>

                    <p class="w3-margin w3-center">
                        Демонстрационная учетная запись: user1@mail.local / userdemo
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
