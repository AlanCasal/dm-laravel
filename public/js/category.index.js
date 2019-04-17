(function () {
    $(document).ready(function () {

        $('.btn-edit').click(function (e) {
            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');

            var tdName = $('#categoryName' + id);
            var oldName = tdName.text();
            var tdActive = $('#categoryActive' + id);

            if (!row.find('.btn-edit').hasClass("d-none")) {
                row.find('.btn-edit').addClass("d-none");
                row.find('.btn-cancel').removeClass("d-none");
                row.find('.btn-update').removeClass("d-none");

                tdName.html("<input class='form-control' id='categoryEdit" + id + "' name='name' type='text' value='" + oldName + "' placeholder='INGRESÁ UN NOMBRE ...' autofocus>");
                tdActive.html("<select class='form-control' id='selectActive"+id+"' name='active'><option value='SI'>SÍ</option><option value='NO'>NO</option></select>");
            }
        });

        $('.btn-update').click(function (e) {
            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#frm-update' + id);

            var inputValue = $('#categoryEdit' + id).val();
            var url = form.attr('action').replace(':CATEGORY_NAME', inputValue);
            var data = form.serialize();

            var tdName = $('#categoryName' + id);
            // var tdActive = $('#categoryActive' + id);

            $('#frm_active'+id).val($('#selectActive'+id).val());


            $.post(url, data, function (result) {
                alert(result.message);
                if (row.find('.btn-edit').hasClass('d-none')) {
                    row.find('.btn-edit').removeClass('d-none');
                    row.find('.btn-cancel').addClass("d-none");
                    row.find('.btn-update').addClass("d-none");

                    tdName.html(inputValue);
                    // tdActive.html();
                }
            }).fail(function () {
                alert('La categoría no pudo ser actualizada. Vuelva a intentarlo');
            });
        });

        $('.btn-cancel').click(function (e) {
            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');

            var tdName = $('#categoryName' + id);
            var tdActive = $('#categoryActive' + id);
            var oldName = row.data('name');
            var oldActive = row.data('active');

            if (row.find('.btn-edit').hasClass('d-none')) {
                row.find('.btn-edit').removeClass('d-none');
                row.find('.btn-cancel').addClass("d-none");
                row.find('.btn-update').addClass("d-none");

                tdName.html(oldName);
                tdActive.html(oldActive);
            }
        });

        $('.btn-destroy').click(function (e) {
            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#frm-destroy' + id);

            var url = form.attr('action');
            var data = form.serialize();

            $.post(url, data, function (result) {
                alert(result.message);
                row.fadeOut();
            }).fail(function () {
                alert('La categoría no pudo ser eliminada. Vuelva a intentarlo');
                row.show();
            });

        });

    });
})();