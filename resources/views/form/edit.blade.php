@extends('layouts.app')
@section('content')
    <h1 data-form-id="{{$form->form_uid}}">Edit form {{$form->name}}</h1>
    <button class="btn btn-primary add_modal_input">Add new input</button>
    <button class="btn btn-primary btn_modal_textarea">Add new textarea</button>
    <button class="btn btn-primary btn_modal_select">Add new select</button>

    <br>

    <div class="my_form mt-5">
        @forelse($form->inputs as $input)
            @include('input.input', ['input' => $input])
        @empty
        @endforelse

        @forelse($form->selects as $select)
            @include('select.select', ['select' => $select])
            @empty
            @endforelse

            @forelse($form->textarea as $textarea)
                @include('textarea.textarea', ['text' => $textarea])
            @empty
            @endforelse

    </div>


    <div class="modal fade" id="edit_modal_input" tabindex="-1" aria-labelledby="edit_modal_input" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Edit input</h5>
                    <button type="button" class="btn-close modal-close" data-bs-dismiss="edit_modal_input" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="input_form_edit">
                        <div class="mb-3">
                            <input type="hidden" class="edit_input_id">
                            <label for="name" class="form-label">Name for input</label>
                            <input type="text" class="form-control edit_input_name" id="name" name="name" aria-describedby="name">
                            <div id="name" class="form-text">Field is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type for input</label>
                            <input type="text" class="form-control edit_input_type" id="type" name="type" aria-describedby="type">
                            <div id="type" class="form-text">Field is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description for input</label>
                            <input type="text" class="form-control edit_input_description" id="description" name="description" aria-describedby="description">
                            <div id="description" class="form-text">Field is required</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="edit_modal_input">Close</button>
                    <button type="button" class="btn btn-primary edit_save_input">Edit input</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal input -->
    <div class="modal fade" id="modal_input" tabindex="-1" aria-labelledby="modal_input" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Create input</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="input_add_form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name for input</label>
                            <input type="text" class="form-control input_name" id="name" name="name" aria-describedby="name">
                            <div id="name" class="form-text">Field is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type for input</label>
                            <input type="text" class="form-control input_type" id="type" name="type" aria-describedby="type">
                            <div id="type" class="form-text">Field is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description for input</label>
                            <input type="text" class="form-control input_description" id="description" name="description" aria-describedby="description">
                            <div id="description" class="form-text">Field is required</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_input">Create input</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Model select -->
    <div class="modal fade" id="modal_select" tabindex="-1" aria-labelledby="modal_select" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Create input</h5>
                    <button type="button" class="btn-close modal_select_close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="modal_add_select">
                        <input type="hidden" value="{{ $form->form_uid }}" name="form_uid">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}" name="name" id="select_name" type="text"
                                   class="form-control @if($errors->has('name')) is-invalid @endif">
                            <div id="emailHelp" class="form-text">Please, enter a name of this select</div>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input id="select_description" value="{{ old('description') }}" name="description" type="text"
                                   class="form-control @if($errors->has('description')) is-invalid @endif" >
                            <div id="description" class="form-text">Please, enter a description of this select</div>
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <h6>Variants</h6>
                        <div class="mb-3 selects" id="selects" >
                            <div>
                                <input name="options[]" type="text"
                                       class="form-control variants">
                                <div class="form-text">Please, enter a variant for this select</div>
                            </div>
                            <div>
                                <input name="options[]" type="text"
                                       class="form-control variants">
                                <div class="form-text">Please, enter a variant for this select</div>
                            </div>
                            @error('variants.*')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <button class="btn btn-primary mt-3" id="add_variant">Add variant</button>
                        </div>
                        <button type="button" class="btn btn-primary btn_add_select">Create input</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_select_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal input -->
    <div class="modal fade" id="modal_textarea" tabindex="-1" aria-labelledby="modal_textarea" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Create textarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="modal_textarea_form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name for textarea</label>
                            <input type="text" class="form-control textarea_name" id="name" name="name" aria-describedby="name">
                            <div id="name" class="form-text">Field is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description for textarea</label>
                            <input type="text" class="form-control textarea_description" id="description" name="description" aria-describedby="description">
                            <div id="description" class="form-text">Field is required</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_add_textarea">Create textarea</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/jquery.js"></script>
    <script>

        $('.btn_modal_textarea').on('click', function (){
            $('#modal_textarea').modal('show');
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


        $('.btn_modal_select').on('click', function (){
            $('#modal_select').modal('show');
        })



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

        $('.my_form').on('click', 'button', function(e) {
            console.log(e.target)
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

        $('.my_form').on('click', 'a', function(e) {
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
                  console.log(response);
              });
          }
        })

    </script>
@endsection
