@extends('layouts.app')
@section('content')
<h1>
    Create new form
</h1>

<form action="{{route('form.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Names for the form</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
        <div id="name" class="form-text">Field is required</div>
    </div>
    <button type="submit" class="btn btn-outline-primary">Create</button>
</form>
@endsection
