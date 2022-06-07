<script>


    $('.close_textarea').on('click', function (){
        $('#edit_modal_textarea').modal('toggle');
    })

    $('.btn_modal_textarea').on('click', function (){
        $('#modal_textarea').modal('show');
    })

    $('.my_form').on('click', '.btn_edit_textarea', function (e){
        $('#edit_modal_textarea').modal('show');

        const element = e.currentTarget;
        const textareaId = $(element).data('textarea-id');
        const textareaName = $(element).parent().find('textarea').data('textarea-name');
        const textareaDescription = $(element).parent().find('label').data('textarea-description');

        $('.edit_textarea_name').val(textareaName);
        $('.edit_textarea_description').val(textareaDescription);
        $('.edit_textarea_id').val(textareaId);

    })

    $('.edit_save_textarea').on('click', function (){
        const textareaId = $('.edit_textarea_id').val();
        const textareaName = $('.edit_textarea_name').val();
        const textareaDescription = $('.edit_textarea_description').val();

        $.ajax({
            method: 'PUT',
            url: `/textarea/${textareaId}`,
            data: {
                'name': textareaName,
                'description': textareaDescription,
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            console.log(response)
            $(`#textarea-${textareaId}`).replaceWith(response.textarea);
            $('#edit_modal_textarea').modal('toggle');
        }).fail(response => {
            return false
        });
    })



    $('.btn_add_textarea').on('click', function (){
        const name = $('.textarea_name').val();
        const description = $('.textarea_description').val();
        const myForm = $('.my_form');
        $.ajax({
            method: 'POST',
            url: `{{ route('textarea.store') }}`,
            data: {
                "name": name,
                "description": description,
                "form_uid": "{{$form->form_uid}}",
                "_token": "{{ csrf_token() }}",
            }
        }).done(response => {
            myForm.prepend(response.textarea);
            $('.modal_textarea_form').trigger('reset');
            $('#modal_textarea').modal('toggle');
        }).fail(response => {
            console.log(response);
        });
    })


    $('.my_form').on('click', '.btn_delete_textarea', function (e){
        const element = e.currentTarget;
        const textarea = $(element).data('textarea-id');
        $.ajax({
            method: 'DELETE',
            url: `/textarea/${textarea}`,
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
