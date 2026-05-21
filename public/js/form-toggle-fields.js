
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