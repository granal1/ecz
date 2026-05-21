@php
    $activeMenu = 'API';
@endphp

@extends('main')

@section('content')
    <section class='w3-container w3-content w3-padding-64'>
        <h1 class="w3-center">Работа с API</h1>
        <p>Задача по работе с API следующая:
            <blockquote class="w3-panel w3-leftbar w3-light-grey">
                <p class="w3-large"><i>
                    Напишите Laravel проект, в состав которого обязательно входит​<br>
                    1. Консольная команда, которая каждые 5 минут получает информацию от
                    любого API на ваш выбор и сохраняет её в таблицу БД​<br>
                    2. Route, отдающий массив записей таблицы в формате json<br>
                    Например: https://official-joke-api.appspot.com/random_joke</i>
                </p>
            </blockquote>
        </p>
        <p>Создана консольная команда, вызываемая по "php artisan fetch:joke".
            Команда выполняется следующим образом:
            <ul class="w3-ul">
                <li>обращение на API https://official-joke-api.appspot.com/random_joke</li>
                <li>проверка успешного ответа</li>
                <li>запись полученных данных в таблицу, если таких данных еще нет</li>
            </ul>
        </p>
        <p>Для работы с очередью использовался Redis. 
            Работник может быть запущен через Supervisor или другой менеджер процессов для надёжности.
        </p>
        <p>
            Route, отдающий массив записей таблицы в формате json срабатывает по url:
            <a href="/api/v1/jokes" target="_blank"><b>"/api/v1/jokes"</b></a>
        </p>
    </section>
@endsection

@push('scripts')
    <script src="/js/visiteurs-register.js"></script>
@endpush