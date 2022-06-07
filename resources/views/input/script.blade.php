<script>
    $('.edit_save_input').on('click', function (){
        const inputId = $('.edit_input_id').val();
        const inputName = $('.edit_input_name').val();
        const inputType = $('.edit_input_type').val();
        const inputDescription = $('.edit_input_description').val();

        $.ajax({
            method: 'PUT',
            url: `/input/${inputId}`,
            data: {
                'name': inputName,
                'type': inputType,
                'description': inputDescription,
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            console.log(response)
            $(`#input-${inputId}`).replaceWith(response.input);
            $('#edit_modal_input').modal('toggle');
        }).fail(response => {
            return false
        });
    })

    $('.add_modal_input').on('click', function (){
        $('#modal_input').modal('show');
    })

    $('.modal-close').on('click', function (){
        $('#edit_modal_input').modal('toggle');
    })

    $('.my_form').on('click', '.edit_input', function(e) {
        $('#edit_modal_input').modal('show');
        const element = e.currentTarget;
        const inputId = $(element).data('input-id');
        const inputName = $(element).parent().find('input').data('input-name');
        const inputDescription = $(element).parent().find('label').data('input-description');
        const inputType = $(element).parent().find('input').data('input-type');

        $('.edit_input_name').val(inputName);
        $('.edit_input_description').val(inputDescription);
        $('.edit_input_type').val(inputType);
        $('.edit_input_id').val(inputId);
    })

    $('.my_form').on('click', '.btn_delete_input', function(e) {
        const element = e.currentTarget;
        const inputId = $(element).data('input-id');
        $.ajax({
            method: 'DELETE',
            url: `/input/${inputId}`,
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            this.parentElement.remove();
        }).fail(response => {
            return false
        });
    })


    $('.btn_add_input').on('click', function () {
        const name = $('.input_name').val();
        const type = $('.input_type').val();
        const description = $('.input_description').val();
        const myForm = $('.my_form');
        if(name.length >= 3 && type.length >= 3 && description.length >= 3){
            $.ajax({
                method: 'POST',
                url: `{{ route('input.store') }}`,
                data: {
                    "name": name,
                    "type": type,
                    "description": description,
                    "form_uid": "{{$form->form_uid}}",
                    "_token": "{{ csrf_token() }}",
                }
            }).done(response => {
                myForm.prepend(response.input);
                $('#input_add_form').trigger('reset');
                $('#modal_input').modal('toggle');
            }).fail(response => {
                return false
            });
        }
    })
</script>
