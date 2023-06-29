@extends('layouts.app')
@php($messages_count = \App\Models\Message::where('user_id', '=', $user->id)->count())
@section('content')
    <div class="container mt-5">
        <h1>Информация о пользователе</h1>
        <div class="d-flex mt-5">
            <img src="{{ asset($user->avatar) }}" alt="User" class="rounded-circle d-flex align-self-start me-3 shadow-sm">
            <div class="row m-5">
                <p><b>Имя: </b>{{ $user->name }}</p>
                <p><b>E-Mail: </b>{{ $user->email }}</p>
                <p><b>Сообщений отправлено: </b>{{ $messages_count }}</p>
            </div>
        </div>
    </div>
@endsection
