@extends('layouts.app')

@section('content')
    @if (count($answers) > 0)
        @foreach($answers as $answer)
            <div class="card mt-2">
                <h5 class="card-header">{{ $answer->form->name }}</h5>
                <div class="card-body">
                    @foreach(json_decode($answer->answers) as $key => $value)
                        <h5 class="card-title">{{ $key . ': ' .  $value}}</h5>
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center mt-5">
            <div class="col-md-auto">
                {{$answers->links('pagination::bootstrap-4')}}
            </div>
        </div>
    @else
        <h3>No answers</h3>
    @endif

@endsection

