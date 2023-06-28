@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form class="input-group mb-3" method="post" action="{{ route('send') }}">
            @csrf
            <input type="text" name="text" class="form-control" placeholder="{{ __("Enter a message") }}" aria-label="{{ __("Enter a message") }}" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <input class="btn btn-outline-secondary rounded-start-0" type="submit" value="{{ __("Send") }}">
            </div>
        </form>
        <div>
            @foreach($messages as $msg)
                <div class="row p-3">
                    <img src="{{ asset('default_avatar.png') }}" alt="User" width="50" class="col align-self-start col-1">
                    <div class="row col align-self-end">
                        <b class="col align-self-center">{{ \Illuminate\Support\Facades\DB::table('users')->where('id', '=', $msg->user_id)->get()->first()->name }}</b>
                        <p class="">{{ $msg->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
