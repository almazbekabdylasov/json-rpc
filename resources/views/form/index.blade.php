@extends('layouts.app')
@section('content')
<h1>
    All forms:
</h1>
@forelse($forms as $form)
<div class="card">
    <div class="card-header">
        {{$form->name}}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$form->name}}</h5>
        <a href="{{route('form.edit', ['form' => $form])}}" class="btn btn-primary">Go edit</a>
    </div>
</div>
@empty
    <p>No forms</p>
@endforelse


<a href="{{route('form.create')}}">Create new form</a>
@endsection
