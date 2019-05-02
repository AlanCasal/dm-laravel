(() => {
    $(document).ready(() => {

        // STORE MODAL
        $('#btn-store-modal').click((e) => {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();

            $('#modal-store').modal('show');
            $('.modal-title-store').text('NUEVO USUARIO');
        });

        // EMAIL INPUT UPDATE
        $('#username').change(() =>
            $('#email').val($('#username').val()));

        // STORE SUBMIT
        $('#btn-store').click((e) => {
            e.preventDefault();
            remove_feedback();

            let url = $('#frm-store').attr('action');
            let data = $('#frm-store').serialize();

            $.post(url, data, (response) => {
                show_success_buttons();
                show_success_feedback(response.success);

            }).fail((response) =>
                show_error_feedback(response.responseJSON.error));
        });

        // DESTROY MODAL
        $('.btn-destroy-modal').click(function (e) {
            e.preventDefault();
            $('#modal-destroy').modal('show');

            let row = $(this).parents('tr');
            let id = row.data('id');
            let name = row.data('username');

            $('.modal-title-destroy').html(`DESEA ELIMINAR AL USUARIO <strong class="text-warning">${name}</strong> ?`);
            $('#destroy_id').val(id);
        });

        // DESTROY SUBMIT
        $('#btn-destroy').click((e) => {
            e.preventDefault();

            let id = $('#destroy_id').val();
            let url = $('#frm-destroy').attr('action').replace(':ID', id);
            let data = $('#frm-destroy').serialize();

            $.post(url, data, (response) => {
                $('.modal-title-destroy').html(`EL USUARIO <strong class="text-danger">${response.success}</strong> HA SIDO ELIMINADO.`);
                show_success_buttons();

            }).fail(() =>
                alert('EL USUARIO NO PUDO SER ELIMINADO. POR FAVOR VUELVA A INTENTARLO.'));
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
        $('.form-control').keypress(function (e) {
            if (e.which === 13) {
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

        function show_error_feedback(errors) {
            let firstItem = Object.keys(errors)[0];
            let firstItemDOM = $(`#${firstItem}`);
            let firstItemMessage = errors[firstItem][0];

            if (!$('.form-control').hasClass('is-invalid')) {
                firstItemDOM.addClass('is-invalid').focus();
                firstItemDOM.after(`<span class="invalid-feedback text-danger"><strong>${firstItemMessage}</strong></span>`);
                $('.modal-content').addClass('border border-danger');
            }
        }

        function show_success_feedback(message) {
            $('.modal-content').addClass('border border-success');
            $('.form-control').prop('readonly', true);
            $('.form-control').addClass('is-valid');
            $('#password-confirm').after(`<span class="text-success valid-feedback" role="alert"><strong>${message}</strong></span>`);
        }

        function show_success_buttons() {
            $('.btn-action').hide();
            $('.btn-close').addClass('reload');
            $('.btn-close-text').text('Aceptar');

            if (!$('#modal-destroy').is(':visible')) {
                $('.btn-close-text').removeClass('btn-light').addClass('btn-success text-dark');
                // $('.btn-edit').show();
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