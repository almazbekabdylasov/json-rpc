<div class="my-3">
    <label class="form-label">{{$select->description}}</label>
    <select name="{{$select->name}}">
        @foreach($select->options as $option)
            <option  value="{{$option->value}}">{{$option->value}}</option>
        @endforeach
    </select>
</div>
