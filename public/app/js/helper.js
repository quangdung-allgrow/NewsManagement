$(document).ready(function() {
    //chon row tren bang khi click checkbox
    $('#table-data').on('click', 'td input[type=checkbox]', function() {
        var size = $('input[name=row_del]').size();
        var $row = $(this).closest('tr');
        var checke_all = true;
        var c = 0;
        if (this.checked) {
            $row.addClass('active');
        } else {
            $row.removeClass('active');
            checke_all = false;
        }

        $('input[name=row_del]').each(function(i, obj) {
            if (!obj.checked) {
                checke_all = false;
                c++;
            }
        });

        $('#checked-all').prop('checked', checke_all);
        if (c < size - 1) {
            $('.btn-del-all').prop("disabled", false);
        } else {
            $('.btn-del-all').prop("disabled", true);
        }
    });

    $('#checked-all').click(function() {
        if ($(this).is(':checked')) {
            $('.btn-del-all').prop("disabled", false);
            $('input[name=row_del]').each(function(i, obj) {
                $(this).prop('checked', true);
                $(this).closest('tr').addClass('active');
            });
        } else {
            $('.btn-del-all').prop("disabled", true);
            $('input[name=row_del]').each(function(i, obj) {
                $(this).prop('checked', false);
                $(this).closest('tr').removeClass('active');
            });
        }
    });

    // hien thi so ky tu
    $('textarea').keyup(function() {
        var count_id = $(this).data('id_count');
        var text = $(this).val();
        $('.count_char_' + count_id).text(text.length + ' chars');
    });

});