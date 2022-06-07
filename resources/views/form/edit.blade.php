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

    <!-- Modal input  edit -->
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


    <!-- Modal input create-->
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
    <!-- Model select create -->
    <div class="modal fade" id="modal_select" tabindex="-1" aria-labelledby="modal_select" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Create select</h5>
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
                        </div>
                        <button class="btn btn-primary" id="add_variant">Add variant</button>
                        <button type="button" class="btn btn-primary btn_add_select">Create select</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_select_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal textarea create -->
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

    <!-- Modal textarea edit -->
    <div class="modal fade" id="edit_modal_textarea" tabindex="-1" aria-labelledby="edit_modal_textarea" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Edit textarea</h5>
                    <button type="button" class="btn-close close_textarea" data-bs-dismiss="close_textarea" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="input_form_edit">
                        <div class="mb-3">
                            <input type="hidden" class="edit_textarea_id">
                            <label for="name" class="form-label">Name for textarea</label>
                            <input type="text" class="form-control edit_textarea_name" id="name" name="name" aria-describedby="name">
                            <div id="name" class="form-text">Field is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description for textarea</label>
                            <input type="text" class="form-control edit_textarea_description" id="description" name="description" aria-describedby="description">
                            <div id="description" class="form-text">Field is required</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_textarea" >Close</button>
                    <button type="button" class="btn btn-primary edit_save_textarea">Edit textarea</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Model select edit -->
    <div class="modal fade" id="edit_modal_select" tabindex="-1" aria-labelledby="edit_modal_select" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="input">Edit select</h5>
                    <button type="button" class="btn-close modal_select_edit_close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="modal_add_select">
                        <input type="hidden" value="{{ $form->form_uid }}" name="form_uid">
                        <input type="hidden" class="edit_select_id" name="edit_select_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}" name="name" id="edit_select_name" type="text"
                                   class="form-control @if($errors->has('name')) is-invalid @endif">
                            <div id="emailHelp" class="form-text">Please, enter a name of this select</div>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input id="edit_select_description" value="{{ old('description') }}" name="description" type="text"
                                   class="form-control @if($errors->has('description')) is-invalid @endif" >
                            <div id="description" class="form-text">Please, enter a description of this select</div>
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <h6>Edit Variants</h6>
                        <div class="mb-3 selects" id="edit_select" >
                            @error('variants.*')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-primary " id="edit_variant">Add variant</button>
                        <button type="button" class="btn btn-primary btn_edit_select">Edit select</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_select_edit_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="/assets/js/jquery.js"></script>
    @include('input.script')
    @include('textarea.script')
    @include('select.script')
@endsection
