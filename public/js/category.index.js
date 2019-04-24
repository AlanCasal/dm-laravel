(() => {
    $(document).ready(() => {

        // UPDATE MODAL
        $('.btn-modal-update').click(function (e) {
            e.preventDefault();

            remove_feedback();
            show_buttons_for_edit();

            $('#modal-edit').modal('show'); // frm-edit

            var row = $(this).parents('tr');
            var id = row.data('id'); // id de la categoría desde la tabla
            var name = row.data('name'); // nombre de la categoría desde la tabla

            $('#edit_id').val(id); // le paso el id al hidden input
            $('#name').val(name); // al input name le pongo el nombre de la categoría
            $('.modal-title-update').text(name); // el título del modal edit
        });

        // SUBMIT UPDATE
        $('#btn-update').click(e => {
            e.preventDefault();

            var id = $('#edit_id').val();
            var url = $('#frm-edit').attr('action').replace(':ID', id);
            var data = $('#frm-edit').serialize();

            $.post(url, data, data => {
                remove_feedback();
                put_success_feedback(data.success);

                $('.modal-title-update').text($('#name').val().toUpperCase());

                show_buttons_on_success();
            }).fail(data => {
                remove_feedback();
                put_invalid_feedback(data.responseJSON.error);
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

        // SUBMIT DESTROY
        $('#btn-destroy').click(e => {
            e.preventDefault();

            var id = $('#destroy_id').val();
            var form = $('#frm-destroy');
            var url = form.attr('action').replace(':ID', id);
            var data = form.serialize();

            $.post(url, data, function (data) {
                $('.modal-title-destroy').html('LA CATEGORÍA ' + '<strong>' + data.name + '</strong>' + ' HA SIDO ELIMINADA.'); // el título del modal edit

                $('#btn-destroy').hide();

                $('.btn-close-text').text('Cerrar')
            }).fail(function () {
                alert('La categoría no pudo ser eliminada. Vuelva a intentarlo');
            });
        });

        // CANCEL/CLOSE
        $('.btn-close').click(e => { // botón de cancelar/cerrar comportamiento
            e.preventDefault();
            $('.modal').modal('hide');

            if (!$('.btn-action').is(':visible')) // si no hay botón de acción, es porque ya sé clickeó
                location.reload(); // para que tomen efecto en el front los cambios en la db
        });

        // EDIT MODAL (cuando el post dio success)
        $('.btn-edit').click((e) => {
            e.preventDefault();

            remove_feedback();

            show_buttons_for_edit();
        });

        // ENTER KEY BIND TO SUBMIT
        $('#name').keypress(function(e) {
            if(e.which === 13) {
                $(this).blur();
                $('#btn-update').focus().click(); // ENTER simula clic
                e.preventDefault(); // prevengo al ENTER (muestra el json con error en pantalla sinó)
                // return false;
            }
        });

        //////////////////////////////////////////
        //////////////////////////////////////////

        // FEEDBACK
        function remove_feedback() {
            if ($('#name').hasClass('is-invalid')) {
                $('#name').removeClass('is-invalid');
                $('.modal-content').removeClass('border border-danger');
                $('.invalid-feedback').remove();
            }

            if ($('#name').hasClass('is-valid')) {
                $('#name').removeClass('is-valid');
                $('.modal-content').removeClass('border border-success');
                $('.valid-feedback').remove();
                $('#name').prop('readonly', false);
            }
        }

        function put_invalid_feedback(message) {
            if (!$('#name').hasClass('is-invalid')) {
                $('#name').addClass('is-invalid');
                $('.modal-content').addClass('border border-danger');
                $('#name').after('<span class="text-danger invalid-feedback" role="alert"><strong>' + message + '</strong></span>');
            }
        }

        function put_success_feedback(message) {
            $('.modal-content').addClass('border border-success');
            $('#name').prop('readonly', true);
            $('#name').addClass('is-valid');
            $('#name').after('<span class="text-success valid-feedback" role="alert"><strong>' + message + '</strong></span>');
        }

        function show_buttons_on_success() {
            $('#btn-update').hide();
            $('.btn-edit').show();
            $('.btn-close-text').text('Cerrar')
        }
        
        function show_buttons_for_edit() {
            $('.btn-action').show();
            $('.btn-close-text').text('Cancelar');
            $('.btn-edit').hide();
        }

    });
})();