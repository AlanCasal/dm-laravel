(() => {
    $(document).ready(() => {
        // FILTRO DE CATEGORÍAS
        $('#filter-category').change(function () {
            let category_id = $(this).val();

            if (category_id == 'all')
                $('.category_item').show();
            else {
                $('.category_item').hide();
                $('.item_' + category_id).show();
            }
        });

        // UPDATE MODAL
        $('.btn-modal-update').click(function (e) {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();

            $('#modal-update').modal('show'); // frm-update

            let row = $(this).parents('tr');

            $('#edit_id').val(row.data('id'));
            $('#name').val(row.data('name')); // al input name le pongo el nombre del producto
            $('#price').val(row.data('price'));
            $('#category' + row.data('category')).attr('selected', 'selected');
            $('#stock').val(row.data('stock'));

            $('.modal-title-update').text(row.data('name')); // el título del modal edit
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
                $('.modal-title-update').text($('#name').val().toUpperCase());

            }).fail((response) =>
                show_error_feedback(response.responseJSON.error));
        });

        // DESTROY MODAL
        $('.btn-destroy-modal').click(function (e) {
            e.preventDefault();

            $('#modal-destroy').modal('show'); // frm-destroy

            let row = $(this).parents('tr');
            let id = row.data('id');
            let name = row.data('name');

            $('#destroy_id').val(id); // le paso el id al hidden input

            $('.modal-title-destroy').html(`¿ DESEA ELIMINAR EL PRODUCTO <strong class="text-warning">${name}</strong> ?`);
        });

        // DESTROY SUBMIT
        $('#btn-destroy').click((e) => {
            e.preventDefault();

            let id = $('#destroy_id').val();
            let url = $('#frm-destroy').attr('action').replace(':ID', id);
            let data = $('#frm-destroy').serialize();

            $.post(url, data, (response) => {
                $('.modal-title-destroy').html(`EL PRODUCTO <strong class="text-danger">${response.success} </strong> HA SIDO ELIMINADO.`); // el título del modal edit
                show_success_buttons();

            }).fail(() =>
                alert('EL PRODUCTO NO PUDO SER ELIMINADO. POR FAVOR VUELVA A INTENTARLO.'));
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

        // ENTER KEY BIND TO SUBMIT
        $('.modal-input').keypress(function (e) {
            if (e.which === 13) {
                $(this).blur();
                $('#btn-update').focus().click(); // ENTER simula clic
                e.preventDefault(); // prevengo al ENTER (muestra el json con error en pantalla sinó)
            }
        });

        $('.btn-edit').click((e) => {
            e.preventDefault();
            remove_feedback();
            show_edit_buttons();
            $('.hint').show();

            /*if ($('#modal-store').is(':visible')) {
                let newCategory = $('#store_name').val();
                let newID = $('#store_name').data('id');
                $('.modal').modal('hide');

                $('#modal-update').modal('show');
                $('.modal-title-update').text(newCategory); // el título del modal edit
                $('#edit_name').val(newCategory);
                $('#edit_id').val(newID);
            }*/
        });

        //////////////////////////////////////////
        //////////////////////////////////////////

        // FEEDBACK
        function remove_feedback() {
            if ($('.modal-input').hasClass('is-invalid')) {
                $('.modal-input').removeClass('is-invalid');
                $('.modal-content').removeClass('border border-danger');
                $('.invalid-feedback').remove();
            }

            if ($('.modal-input').hasClass('is-valid')) {
                $('.modal-input').removeClass('is-valid');
                $('.modal-input').prop('readonly', false);
                $('.modal-content').removeClass('border border-success');
                $('.valid-feedback').remove();
            }
        }

        function show_error_feedback(errors) {
            let firstItem = Object.keys(errors)[0];
            let firstItemDOM = $(`#${firstItem}`);
            let firstItemMessage = errors[firstItem][0];

            if (!$('.modal-input').hasClass('is-invalid')) {
                firstItemDOM.addClass('is-invalid').focus();
                firstItemDOM.after(`<span class="invalid-feedback text-danger"><strong>${firstItemMessage}</strong></span>`);
                $('.modal-content').addClass('border border-danger');
            }
        }

        function show_success_feedback(message) {
            $('.modal-content').addClass('border border-success');
            $('.modal-input').prop('readonly', true);
            $('.modal-input').addClass('is-valid');
            $('#stock').after(`<span class="text-success valid-feedback" role="alert"><strong>${message}</strong></span>`);
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

    })
})();