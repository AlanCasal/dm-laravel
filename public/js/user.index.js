(function () {
    $(document).ready(function () {

        $('.btn-destroy').click(function (e) {
            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#frm-destroy'+id);

            var url = form.attr('action');
            var data = form.serialize();

            $.post(url, data, function (result) {
                alert(result.message);
                row.fadeOut();
            }).fail(function () {
                alert('El usuario no pudo ser eliminado. Vuelva a intentarlo');
                row.show();
            });
        });

    });
})();