@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="{{ __("Enter a message") }}" aria-label="{{ __("Enter a message") }}" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <input class="btn btn-outline-secondary rounded-start-0" type="submit" value="{{ __("Send") }}">
            </div>
        </div>
    </div>
</div>
@endsection
