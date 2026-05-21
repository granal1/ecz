@php
    $activeMenu = 'Форма';
@endphp

@extends('main')

@section('content')
    <section class='w3-container w3-content w3-padding-64'>
        <h1 class="w3-center">Работа с формой, корректируемой js</h1>
        <p>Задача по работе с формой:
        <blockquote class="w3-panel w3-leftbar w3-light-grey">
            <p class="w3-large"><i>
                    Необходимо написать js код, который в зависимости от выбранного значения поля
                    Тип отражает разный набор полей на странице 
                    <a href="http://test.amopoint-dev.ru/testzz/testlist.html" target="_blank"><b>http://test.amopoint-dev.ru/testzz/testlist.html</b></a><br>
                    Должны отображаться только те поля в атрибуте name которых есть
                    значение выбранного элемента списка. <br>
                    Решение должно представлять из себя файл для подключения к странице,
                    либо сниппет для запуска в браузере в консоли.</i>
            </p>
        </blockquote>
        </p>
        <p>Cниппет, для запуска в консоли браузера на указанном сайте:</p>
        <div class="w3-code jsHigh notranslate">
<pre>
$(document).ready(function () {
    const $TypeSelect = $(`select[name^="type_val"]`);
    const $Feilds = $('input[name^="input_"]');

    // Обновления видимости
    function toggleFields() {
        const selectedType = $TypeSelect.val();
        $Feilds.each(function () {
            $(this).attr('name').includes(selectedType) ? $(this).show() : $(this).hide();
        });
    }

    // при загрузке
    toggleFields();

    // при изменении
    $TypeSelect.on('change', toggleFields);
});
</pre>
        </div>
        <p>Работа сниппета заключается в:
            <ul class="w3-ul">
                <li>После загрузки страниуы выборе "select" и "input" с "name", согласно шаблона</li>
                <li>Выполнении функции после загрузки страницы или изменении "select"</li>
                <li>Функция определяет значение "select" и обходя "input" показывает или скрывает их, 
                    в зависимости от наличия в "name" значения "select"</li>
            </ul> 
        </p>
        <p>Подписи полей на странице являются текстом абзаца, как и само поле, впрочем, по этому было решено абзац не скрывать. <br>
            Подписи полей в теге "label" конечно стоило бы скрыть тоже. 
        </p>
        <p>
            Задание, есть задание, но ниже приведена форма с аналогичным функционалом, не с полем "name", а с использованием классов.
        </p>

        <h2 class="w3-center">Форма с полями в зависимости от выбранного поля "Тип"</h2>

        <div class="w3-card-4">
            <div class="w3-container w3-green">
                <h2>Заголовок формы</h2>
            </div>

            <form class="w3-container" action="#">

                <select class="w3-select w3-border w3-margin-top" id="type-of-transport" name="option" required>
                    <option value="" disabled selected>Выбете тип транспортного средства</option>
                    <option value="car">Автомобиль</option>
                    <option value="boat">Катер</option>
                    <option value="plane">Самолет</option>
                </select>

                <p>
                    <input class="w3-input" type="text" id="engin-power" name="engin-power">
                    <label for="engin-power">Мощность двигателя</label>
                </p>
                <p>
                    <input class="w3-input" type="text" id="plane-gross-weight" name="plane-gross-weight">
                    <label for="plane-gross-weight">Максимальная взлетная масса</label>
                </p>
                <p>
                    <input class="w3-input" type="text" id="boat-displacement" name="boat-displacement">
                    <label for="boat-displacement">Водоизмещение</label>
                </p>
                <p>
                    <input class="w3-input" type="text" id="car-weight" name="car-weight">
                    <label for="car-weight">Вес автомобиля</label>
                </p>
                <p>
                    <input class="w3-input" type="text" id="price" name="price">
                    <label for="price">Цена</label>
                </p>

                <p><button class="w3-btn w3-green">Добавить</button></p>

            </form>
        </div>
        <p>
            Выполняется отображение и скрытие полей вместе с "label", с учетом, что "спецполей", в зависимости от типа может быть несколько
            и дает больше гибкости, особенно с именами полей, часто совпадающих с именами полей таблицы в БД, субъективно, такой вариант удобнее. <br>
            Если считать, что изменение типа происходит когда обнаружена ошибка в выборе, то данные в предыдущем "спецполе" больше не нужны, 
            здесь они удаляются при скрытии.
        </p>
    </section>
@endsection

@push('scripts')
    <script src="/js/jquery.js"></script>
    <script src="/js/form.js"></script>
@endpush
