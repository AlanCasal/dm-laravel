(() => {
    $(document).ready(() => {

        // UPDATE MODAL
        $('.btn-modal-update').click(function (e) {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();

            $('#modal-edit').modal('show'); // frm-edit

            var row = $(this).parents('tr');
            var id = row.data('id'); // id de la categoría desde la tabla
            var name = row.data('name'); // nombre de la categoría desde la tabla

            $('#edit_id').val(id); // le paso el id al hidden input
            $('#edit_name').val(name); // al input name le pongo el nombre de la categoría
            $('.modal-title-update').text(name); // el título del modal edit
        });

        // UPDATE SUBMIT
        $('#btn-update').click((e) => {
            e.preventDefault();
            remove_feedback();

            var id = $('#edit_id').val();
            var url = $('#frm-edit').attr('action').replace(':ID', id);
            var data = $('#frm-edit').serialize();

            $.post(url, data, (response) => {
                show_success_feedback(response.success);
                show_success_buttons();
                $('.hint').hide();
                $('.modal-title-update').text($('#edit_name').val().toUpperCase());

            }).fail((response) => {
                response.responseJSON.same ?
                    show_error_feedback(response.responseJSON.same) :
                    show_error_feedback(response.responseJSON.error);
            });
        });

        // DESTROY MODAL
        $('.btn-modal-destroy').click(function (e) {
            e.preventDefault();

            $('#modal-destroy').modal('show'); // frm-destroy

            var row = $(this).parents('tr');
            var id = row.data('id');
            var name = row.data('name');

            $('#destroy_id').val(id); // le paso el id al hidden input

            $('.modal-title-destroy').html('¿ DESEA ELIMINAR LA CATEGORÍA ' + '<strong class="text-warning">' + name + '</strong>' + ' ?'); // el título del modal edit
        });

        // DESTROY SUBMIT
        $('#btn-destroy').click((e) => {
            e.preventDefault();

            var id = $('#destroy_id').val();
            var form = $('#frm-destroy');
            var url = form.attr('action').replace(':ID', id);
            var data = form.serialize();

            $.post(url, data, (response) => {
                $('.modal-title-destroy').html('LA CATEGORÍA ' + '<strong class="text-danger">' + response.success + '</strong>' + ' HA SIDO ELIMINADA.'); // el título del modal edit
                $('#btn-destroy').hide();
                $('.btn-close-text').text('Aceptar')

            }).fail(() =>
                alert('La categoría no pudo ser eliminada. Vuelva a intentarlo'));
        });

        // CANCEL/CLOSE
        $('.btn-close').click(function (e) { // botón de cancelar/cerrar comportamiento
            e.preventDefault();
            $('.modal').modal('hide');

            if ($(this).hasClass('reload')) { // si no hay botón de acción, es porque ya sé clickeó
                $(this).removeClass('reload');
                location.reload(); // para que tomen efecto en el front los cambios en la db
            }
        });

        // EDIT MODAL (cuando el post dio success)
        $('.btn-edit').click((e) => {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();
            $('.hint').show();
        });

        // ENTER KEY BIND TO SUBMIT
        $('.form-control').keypress(function(e) {
            if(e.which === 13) {
                $(this).blur();
                $('#btn-update').focus().click(); // ENTER simula clic
                e.preventDefault(); // prevengo al ENTER (muestra el json con error en pantalla sinó)
            }
        });

        //////////////////////////////////////////
        //////////////////////////////////////////

        // FEEDBACK
        function remove_feedback() {
            if ($('.form-control').hasClass('is-invalid')) {
                $('.form-control').removeClass('is-invalid');
                $('.modal-content').removeClass('border border-danger');
                $('.invalid-feedback').remove();
            }

            if ($('.form-control').hasClass('is-valid')) {
                $('.form-control').removeClass('is-valid');
                $('.modal-content').removeClass('border border-success');
                $('.valid-feedback').remove();
                $('.form-control').prop('readonly', false);
            }
        }

        function show_error_feedback(message) {
            if (!$('.form-control').hasClass('is-invalid')) {
                $('.form-control').addClass('is-invalid');
                $('.modal-content').addClass('border border-danger');
                $('.form-control').after('<span class="text-danger invalid-feedback" role="alert"><strong>' + message + '</strong></span>');
            }
        }

        function show_success_feedback(message) {
            $('.modal-content').addClass('border border-success');
            $('.form-control').prop('readonly', true);
            $('.form-control').addClass('is-valid');
            $('.form-control').after('<span class="text-success valid-feedback" role="alert"><strong>' + message + '</strong></span>');
        }

        function show_success_buttons() {
            $('.btn-close-text').removeClass('btn-light').addClass('btn-success text-dark');
            $('.btn-close').addClass('reload');
            $('#btn-update').hide();
            $('.btn-edit').show();
            $('.btn-close-text').text('Aceptar');
        }

        function show_edit_buttons() {
            $('.btn-close-text').removeClass('btn-success text-dark').addClass('btn-light');
            $('.btn-action').show();
            $('.btn-close-text').text('Cancelar');
            $('.btn-edit').hide();
        }

    });
})();