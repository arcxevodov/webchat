@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-4">
        <div class="p-3 overflow-y-scroll" style="height: 100vh; margin-bottom: 80px" id="messages">
            @include('messages')
        </div>
        <div class="input-group fixed-bottom p-3 bg-white shadow w-75 m-auto mb-5 border rounded-4">
            <input type="text" name="text" id="message" class="form-control rounded border-0 me-3" placeholder="{{ __("Enter a message") }}" aria-label="{{ __("Enter a message") }}" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button
                    id="sendButton"
                    class="btn btn-warning rounded text-white shadow-sm"
                    type="submit"
                    onclick="messageSend('{{ route('send') }}')">{{ __("Send") }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    setInterval(() => {
        $('#messages').load('#messages .messages-divs')
    }, 1000)
    async function messageSend(url) {
        let inputText = $('#message').val()
        $.ajax({
            url: url,
            method: 'get',
            dataType: 'html',
            data: {
                text: inputText
            },
            success: function (data) {
                $('#messages').load('#messages .messages-divs')
                $('#message').val('')
            }
        })
    }
</script>
