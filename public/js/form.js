
$(document).ready(function () {
    const $TypeSelect = $('#type-of-transport');
    const types = $TypeSelect.find('option') // получаем все типы, кроме пустого
        .filter((i, el) => el.value !== '')
        .map((i, el) => el.value)
        .get();
        
    // Функция для обновления видимости полей в зависимости от типа
    function toggleFields() {
        const selectedType = $TypeSelect.val();
        const toHide = types.filter((item) => item !== selectedType); // скрвть эти поля

        // 1. Показать все поля и метки, скрытые ранее
        $('input[name]').show();
        $('input[name]').next('label').show();

        // 2. Очистить и скрыть поля и метки, чьи имена начинаются с любого из типов в toHide
        toHide.forEach(type => {
            $(`input[name^="${type}"]`).each(function () {
                $(this).hide().val('');
                $(this).next('label').hide();
            });
        });
    }

    // Инициализация: показываем нужные поля при загрузке
    toggleFields();

    // Отслеживаем изменения в выборе типа транспорта
    $TypeSelect.on('change', toggleFields);
});