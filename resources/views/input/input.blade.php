<div class="mb-3" id="input-{{$input->id}}">
    <label class="form-label" data-input-description="{{$input->description}}" for="{{$input->name}}">{{$input->description}}</label>
    <input class="form-control" data-input-name="{{$input->name}}" data-input-type="{{$input->type}}" type="{{$input->type}}" name="{{$input->name}}"/>
    <a class="btn_delete_input btn btn-primary" data-input-id="{{$input->id}}" href="#">Delete</a>
    <button class="edit_input btn btn-primary" data-input-id="{{$input->id}}">
        Edit
    </button>
</div>
