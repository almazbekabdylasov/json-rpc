<div class="my-3" id="textarea-{{$textarea->id}}">
    <label data-textarea-description="{{$textarea->description}}" class="form-label">{{$textarea->description}}</label>
    <textarea class="form-control" rows="5" data-textarea-name="{{$textarea->name}}" name="{{$textarea->name}}">
    </textarea>
    <a class="btn_delete_textarea btn btn-primary" data-textarea-id="{{$textarea->id}}" href="#">Delete</a>
    <a class="btn_edit_textarea btn btn-primary" data-textarea-id="{{$textarea->id}}" href="#">Edit</a>
</div>
