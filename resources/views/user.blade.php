@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{ $user->name }}
            {{ $user->email }}
        </div>
    </div>
@endsection
