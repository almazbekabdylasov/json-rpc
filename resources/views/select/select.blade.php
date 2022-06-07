<div class="my-3" id="select-{{$select->id}}">
    <label data-select-description="{{$select->description}}" class="form-label">{{$select->description}}</label>
    <select data-select-name="{{$select->name}}" name="{{$select->name}}">
        @foreach($select->options as $option)
            <option  value="{{$option->value}}">{{$option->value}}</option>
        @endforeach
    </select>
    <a class="btn_delete_select btn btn-primary" data-select-id="{{$select->id}}" href="#">Delete</a>
    <button class="btn btn-primary edit_select" data-select-id="{{$select->id}}">
        Edit
    </button>
</div>
