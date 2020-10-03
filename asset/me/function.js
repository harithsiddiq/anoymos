// make all rows checked
function checkAll() {
    let checkAll = document.querySelector('.check_all');
    let itemcheckbox = Array.from(document.querySelectorAll('.item_checkbox'))
    itemcheckbox.forEach(itemcheckbox => {
        if (checkAll.checked) {
            itemcheckbox.setAttribute('checked', 'checked')
        } else {
            itemcheckbox.removeAttribute('checked')
        }
    });
}

// delete all checked rows
function deleteAll() {
    $('.del_all').on('click', function() {
        $('#form_data').submit();
    });
    $(document).on('click', '.delBtn', function() {
       $('#multiDeleteModel').modal('show');
       let item_checked = $('.item_checkbox:checked').length;
       $('.record_count').text(item_checked);
    });
}

