@php
    $activeMenu = 'Регистрация';
@endphp

@extends('main')

@section('content')
    <div id="app" class="container">
        <div class="w3-display-middle">
            <div class="col-md-8">
                <div class="w3-card-4">
                    <div class="w3-container w3-green">
                        <h2>Регистрация нового пользователя</h2>
                    </div>

                    <div class="w3-container">
                        <form id="form-captcha" method="POST" action="{{ route('register.new-user') }}">
                            @csrf

                            <div class="w3-margin-top">
                                <input id="name" type="text" class="w3-input @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <label for="name" class="w3-text-indigo">имя</label>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w3-margin-top">
                                <input id="email" type="email"
                                    class="w3-input @error('email') w3-border-red w3-small @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                <label for="email" class="w3-text-indigo">email</label>

                                @error('email')
                                    c
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w3-margin-top">
                                <input id="password" type="password"
                                    class="w3-input @error('password') w3-border-red w3-small @enderror" name="password"
                                    required autocomplete="new-password">

                                <label for="password" class="w3-text-indigo">пароль</label>
                            </div>

                            <div class="w3-margin-top">
                                <input id="password-confirm" type="password" class="w3-input" name="password_confirmation"
                                    required autocomplete="new-password">

                                <label for="password-confirm" class="w3-text-indigo">подтвердите пароль</label>
                            </div>

                            <div class="w3-margin-top w3-margin-bottom">
                                <button type="submit" class="w3-btn w3-indigo w3-round-large">
                                    Регистрация
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
