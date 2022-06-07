<script>
    $('.modal_select_edit_close').on('click', function (){
        $('#edit_modal_select').modal('toggle');
    })

    $('.btn_modal_select').on('click', function (){
        $('#modal_select').modal('show');
    })


    $('.my_form').on('click', '.edit_select', function (e){
        $('#edit_modal_select').modal('show');
        $('#edit_select').empty()
        const element = e.currentTarget;
        const selectId = $(element).data('select-id');
        const selectName = $(element).parent().find('select').data('select-name');
        const selectDescription = $(element).parent().find('label').data('select-description');
        const myForm = $('.my_form');
        const test = e.target.parentElement;
        $('.edit_select_id').val(selectId);
        $('#edit_select_name').val(selectName);
        $('#edit_select_description').val(selectDescription);
        const newSelect = $('#edit_select');

        const oldOption = $(test).find('option').map(function (idx, ele){
            if(idx < 2){
                const variant = '<div>' +
                    '<input name="option[]" type="text" value="' + $(ele).val() + ' " class="form-control edit_variants">\n' +
                    '<div class="form-text">Please, enter a variant for this select</div>' +
                    '</div>';
                newSelect.prepend(variant);
            }else{
                const variant = '<div>' +
                    '<input name="option[]" type="text" value="' + $(ele).val() + ' " class="form-control edit_variants">\n' +
                    '<button class="btn btn-outline-danger variant_delete">Delete</button>' +
                    '<div class="form-text">Please, enter a variant for this select</div>' +
                    '</div>';
                newSelect.prepend(variant);
            }
        })
    })

    $('#edit_variant').on('click', function (e) {
        e.preventDefault();
        const variant ='<div>' +
            '<input name="option[]" type="text" class="form-control edit_variants">\n' +
            '<button class="btn btn-outline-danger variant_delete">Delete</button>' +
            '<div class="form-text">Please, enter a variant for this select</div>' +
            '</div>';
        $('#edit_select').prepend(variant)
    })

    $('.btn_edit_select').on('click', function (e) {
        const id = $('.edit_select_id').val();
        const name = $('#edit_select_name').val();
        const description = $('#edit_select_description').val();
        const test = e.target.parentElement;
        const myForm = $('.my_form');
        const options = $(test).find('.edit_variants').map(function (idx, ele) {
            return $(ele).val();
        }).get();
        $.ajax({
            method: 'PUT',
            url: `/select/${id}`,
            data: {
                'name': name,
                'description': description,
                "options": options,
                "form_uid": "{{$form->form_uid}}",
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            console.log(response)
            $(`#select-${id}`).replaceWith(response.select);
            $('#edit_modal_select').modal('toggle');
        }).fail(response => {
            return false
        });
    })



    $('.btn_add_select').on('click', function (e){
        const name = $('#select_name').val();
        const description = $('#select_description').val();
        const test = e.target.parentElement;
        const myForm = $('.my_form');
        const options = $(test).find('.variants').map(function (idx, ele) {
            return $(ele).val();
        }).get();

        $.ajax({
            method: 'POST',
            url: `{{ route('select.store') }}`,
            data: {
                "name": name,
                "options": options,
                "description": description,
                "form_uid": "{{$form->form_uid}}",
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            myForm.prepend(response.select);
            $('.modal_add_select').trigger('reset');
            $('#modal_select').modal('toggle');
        }).fail(response => {
            console.log(response);
        });
    })


    $(document).on('click', '#add_variant', function (e) {
        e.preventDefault();
        const variant ='<div>' +
            '<input name="option[]" type="text" class="form-control variants">\n' +
            '<button class="btn btn-outline-danger variant_delete">Delete</button>' +
            '<div class="form-text">Please, enter a variant for this select</div>' +
            '</div>';
        $('#selects').prepend(variant)
    })

    $(document).on('click', '.variant_delete', function (e) {
        e.preventDefault();
        const element = e.currentTarget;
        element.parentElement.remove();
    })




    $('.my_form').on('click', '.btn_delete_select', function (e){
        const element = e.currentTarget;
        const selectId = $(element).data('select-id');
        $.ajax({
            method: 'DELETE',
            url: `/select/${selectId}`,
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            this.parentElement.remove();
        }).fail(response => {
            return false
        });
    })

</script>
