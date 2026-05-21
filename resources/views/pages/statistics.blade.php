@php
    $activeMenu = 'Статистика';
@endphp

@extends('main')

@section('content')
    <section class='w3-container w3-content w3-padding-64'>
        <h1 class="w3-center">Работа со сбором статистической информации о посещении сайта</h1>
        <p>Задача по работе со статистикой:
        <blockquote class="w3-panel w3-leftbar w3-light-grey">
            <p class="w3-large"><i>
                Написать счетчик посещений страницы. Решение должно состоять из двух
                компонентов: <br>
                -кода на js, который подключается к любому сайту. Скрипт должен собрать
                необходимые данные(ip, город, устройство) и отправлять на сервер. <br>
                -бэк часть, который хранит данные в БД(sqllite или другой на выбор) и
                показывает график посещений по часам(по оси х - количество уникальных
                посещений за час, по оси y- время), круговую диаграмму с разбиением по
                городам.</i>
            </p>
        </blockquote>
        </p>
        <p>
            В качестве источника информации написан небольшой скрипт 
            <a href="/js/visiteurs-register.js" download><b>visiteurs-register.js</b></a>,
            который может быть размещен на любом сайте. Для корректрой работы скрипт доолжен быть настроен в части
            нескольких констант:
        <ul class="w3-ul">
            <li>SERVER_URL - Определяет, куда именно будут отправлены данные для учета</li>
            <li>REGISTRED_USER - Емаил, под которым зарегистрирван пользователь на сервере сбора данных</li>
            <li>API_SERVICE - Сервис определения геолокации пользователя по ip</li>
            <li>API_KEY = API ключ к данному сервису</li>
        </ul>
        </p>
        <div class="w3-panel w3-pale-yellow w3-leftbar w3-rightbar w3-border-yellow">
            <p>Стоит отметить, что точность определения местоположения по ip имеет крайне низкую точность,
                ошибка может быть в пределах области, или даже округа. Зависит от провайдера.</p>
        </div>
        <p>
            Поскольку для отображения статистики на графиках у меня не достаточно данных, была добавлена консольная команда
            для наполнения таблицы,
            вместо фейкера, что дало больше контроля над формируемыми данными.
        </p>
        <p>
            В качестве библиотеки построения графиков использовалась библиотека 
            <a href="https://github.com/plotly/plotly.js">plotly.js</a>
        </p>
        <p>
            С учетом, что требование к графику количества посетителей в зависимости от премени суток было: <br>
            <i><b>"по оси х - количество уникальных посещений за час, по оси y- время"</b></i> <br>
            Было решено использовать горизонтальный бар, т.к. на такой диаграмме наиболее наглядно отображено,
            как влияет время суток на количество уникальных посетителей.
        </p>
    </section>

    <section class='w3-container w3-padding'>
        <h2 class="w3-center">Статистика посещений сайта</h2>
        <div class="w3-flex" style="gap:8px;flex-wrap:wrap;justify-content:center;">
            <div class="w3-col s11 w3-card-4 w3-margin" id="bar-chart" style="max-width:600px"></div>
            <div class="w3-col s11 w3-card-4 w3-margin" id="pie-chart" style="max-width:600px"></div>
        </div>
        <div class="w3-padding-64"></div>
    </section>

@endsection

@push('scripts')
    <script>
        // Встроенные данные из контроллера
        const barData = @json($barData);
        const pieData = @json($pieData);
    </script>
    <script src="/js/plotly3.js"></script>
    <script src="/js/plotly-bar-chart.js"></script>
    <script src="/js/plotly-pie-chart.js"></script>
    <script src="/js/visiteurs-register.js"></script>
@endpush
