(() => {
    $(document).ready(() => {

        // STORE MODAL
        $('#btn-store-modal').click((e) => {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();

            $('#modal-store').modal('show');
            $('.modal-title-store').text('NUEVA CATEGORÍA');
        });

        // STORE SUBMIT
        $('#btn-store').click((e) => {
            e.preventDefault();
            remove_feedback();

            let url = $('#frm-store').attr('action');
            let data = $('#frm-store').serialize();

            $.post(url, data, (response) => {
                show_success_buttons();
                show_success_feedback(response.success);
                $('.hint').hide();
                $('#store_name').attr('data-id', response.id);

            }).fail((response) =>
                show_error_feedback(response.responseJSON.error));
        });

        // UPDATE MODAL
        $('.btn-modal-update').click(function (e) {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();

            $('#modal-update').modal('show'); // frm-update

            let row = $(this).parents('tr');
            let id = row.data('id'); // id de la categoría desde la tabla
            let name = row.data('name'); // nombre de la categoría desde la tabla

            $('#edit_id').val(id); // le paso el id al hidden input
            $('#edit_name').val(name); // al input name le pongo el nombre de la categoría
            $('.modal-title-update').text(name); // el título del modal edit
        });

        // UPDATE SUBMIT
        $('#btn-update').click((e) => {
            e.preventDefault();
            remove_feedback();

            let id = $('#edit_id').val();
            let url = $('#frm-update').attr('action').replace(':ID', id);
            let data = $('#frm-update').serialize();

            $.post(url, data, (response) => {
                show_success_feedback(response.success);
                show_success_buttons();
                $('.hint').hide();
                $('.modal-title-update').text($('#edit_name').val().toUpperCase());

            }).fail((response) => {
                if (response.responseJSON.same) {
                    show_error_feedback(response.responseJSON.same);
                    $('.invalid-feedback').removeClass('text-danger').addClass('text-warning');
                } else
                    show_error_feedback(response.responseJSON.error);
            });
        });

        // DESTROY MODAL
        $('.btn-destroy-modal').click(function (e) {
            e.preventDefault();

            $('#modal-destroy').modal('show'); // frm-destroy

            let row = $(this).parents('tr');
            let id = row.data('id');
            let name = row.data('name');

            $('#destroy_id').val(id); // le paso el id al hidden input

            $('.modal-title-destroy').html(`¿ DESEA ELIMINAR LA CATEGORÍA <strong class="text-warning">${name}</strong> ?`); // el título del modal edit
        });

        // DESTROY SUBMIT
        $('#btn-destroy').click((e) => {
            e.preventDefault();

            let id = $('#destroy_id').val();
            let url = $('#frm-destroy').attr('action').replace(':ID', id);
            let data = $('#frm-destroy').serialize();

            $.post(url, data, (response) => {
                $('.modal-title-destroy').html(`LA CATEGORÍA <strong class="text-danger">${response.success} </strong> HA SIDO ELIMINADA.`); // el título del modal edit
                show_success_buttons();

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

        // EDIT BTN (cuando el .post de store o update dio success)
        $('.btn-edit').click((e) => {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();
            $('.hint').show();
            
            if ($('#modal-store').is(':visible')) {
                let newCategory = $('#store_name').val();
                let newID = $('#store_name').data('id');
                $('.modal').modal('hide');

                $('#modal-update').modal('show');
                $('.modal-title-update').text(newCategory); // el título del modal edit
                $('#edit_name').val(newCategory);
                $('#edit_id').val(newID);
            }
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
                $('.form-control').prop('readonly', false);
                $('.modal-content').removeClass('border border-success');
                $('.valid-feedback').remove();
            }
        }

        function show_error_feedback(message) {
            if (!$('.form-control').hasClass('is-invalid')) {
                $('.form-control').addClass('is-invalid').focus();
                $('.form-control').after(`<span class="text-danger invalid-feedback" role="alert"><strong>${message}</strong></span>`);
                $('.modal-content').addClass('border border-danger');
            }
        }

        function show_success_feedback(message) {
            $('.modal-content').addClass('border border-success');
            $('.form-control').prop('readonly', true);
            $('.form-control').addClass('is-valid');
            $('.form-control').after(`<span class="text-success valid-feedback" role="alert"><strong>${message}</strong></span>`);
        }

        function show_success_buttons() {
            $('.btn-action').hide();
            $('.btn-close').addClass('reload');
            $('.btn-close-text').text('Aceptar');

            if (!$('#modal-destroy').is(':visible')) {
                $('.btn-close-text').removeClass('btn-light').addClass('btn-success text-dark');
                $('.btn-edit').show();
            }
        }

        function show_edit_buttons() {
            $('.btn-close-text').removeClass('btn-success text-dark').addClass('btn-light');
            $('.btn-close-text').text('Cancelar');
            $('.btn-action').show();
            $('.btn-edit').hide();
        }

    });
})();