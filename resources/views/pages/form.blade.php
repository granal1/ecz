@extends('main')

@section('content')
    <section class='w3-container w3-content w3-padding-64'>
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
    </section>
@endsection

@push('scripts')
    <script src="/js/form.js"></script>
@endpush
