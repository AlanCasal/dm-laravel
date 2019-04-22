(function () {
    $(document).ready(function () {

        // UPDATE
        $('.btn-modal-update').click(function (e) {
            e.preventDefault();

            $('#modal-edit').modal('show'); // frm-edit

            var row = $(this).parents('tr');
            var id = row.data('id');
            var name = row.data('name');

            $('#edit_id').val(id); // le paso el id al hidden input
            $('#frm-name').val(name); // al input name le pongo el nombre de la categoría
            $('.modal-title-update').text('EDITAR CATEGORÍA '+ name); // el título del modal edit
        });

        $('#btn-update').click(function (e) {
            e.preventDefault();

            var id = $('#edit_id').val();
            var url = $('#frm-edit').attr('action').replace(':ID', id);
            var data = $('#frm-edit').serialize();

            $.post(url, data, function (result) {
                $('.alert-success').text(result.message);
                $('.alert-success').show();

                $('.update-hint').hide();
                $('#frm-edit').hide();
                $('.modal-title-update').hide();
                $('#btn-update').hide();

                $('.btn-cancel').text('Cerrar')
            }).fail(function () {
                alert('La categoría no pudo ser actualizada. Vuelva a intentarlo');
            });

        });

        // DESTROY
        $('.btn-modal-destroy').click(function (e) {
            e.preventDefault();

            $('#modal-destroy').modal('show'); // frm-destroy

            var row = $(this).parents('tr');
            var id = row.data('id');
            var name = row.data('name');

            $('#destroy_id').val(id); // le paso el id al hidden input
            $('.modal-title-destroy').text('DESEA ELIMINAR LA CATEGORÍA '+ name + ' ?'); // el título del modal edit
        });

        $('#btn-destroy').click(function (e) {
            e.preventDefault();

            var id = $('#destroy_id').val();
            var form = $('#frm-destroy');
            var url = form.attr('action').replace(':ID', id);
            var data = form.serialize();

            $.post(url, data, function (result) {
                $('.alert-danger').text(result.message);
                $('.alert-danger').show();

                $('.modal-title-destroy').hide();
                $('#btn-destroy').hide();

                $('.btn-cancel').text('Cerrar')
            }).fail(function () {
                alert('La categoría no pudo ser eliminada. Vuelva a intentarlo');
            });
        });

        // CANCEL
        $('.btn-cancel').click(function (e) { // botón de cancelar/cerrar comportamiento
            e.preventDefault();
            $('.modal').modal('hide');

            if ($('.alert').is(':visible')) { // si hay una alerta visible
                location.reload();

                setTimeout(function () {
                    $('.alert').hide();

                    $('.modal-title').show(); // los títulos de los dos modals
                    $('.btn-action').show(); // 'guardar' y 'eliminar'

                    $('.btn-cancel').text('Cancelar');

                    $('.update-hint').show();
                    $('#frm-edit').show();
                }, 1500);
            }
        });

    });
})();