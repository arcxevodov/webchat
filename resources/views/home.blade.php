@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="input-group mb-3 px-0">
            <input type="text" name="text" id="message" class="form-control rounded border-warning warning me-3" placeholder="{{ __("Enter a message") }}" aria-label="{{ __("Enter a message") }}" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button
                    id="sendButton"
                    class="btn btn-warning rounded text-white"
                    type="submit"
                    onclick="messageSend('{{ route('send') }}')">{{ __("Send") }}</button>
            </div>
        </div>
        <div class="border border-warning rounded p-3" id="messages">
            @include('messages')
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
