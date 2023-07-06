import './bootstrap';

$('#editMessageForm').on('submit', (e) => {
    e.preventDefault();
    let inputText = $('#editMessageForm textarea').val()
    alert(inputText)
    $.ajax({
        url: $('#editUrl').val(),
        method: 'patch',
        dataType: 'html',
        data: {
            _token: $("input[name='_token']").val(),
            text: inputText
        },
        success: function (data) {
            $('#messages').load('#messages .messages-divs')
            $('#message').val('')
        }
    })
})

$('#deleteMessageForm').on('submit', (e) => {
    e.preventDefault();
    $.ajax({
        url: $('#deleteUrl').val(),
        method: 'delete',
        dataType: 'html',
        data: {
            _token: $("input[name='_token']").val()
        },
        success: function () {
            $('#messages').load('#messages .messages-divs')
        }
    });
})

$('#sendMessageForm').on('submit', (e) => {
    e.preventDefault();
    let inputText = $('#message').val()
    $.ajax({
        url: $('#messageUrl').val(),
        method: 'post',
        dataType: 'html',
        data: {
            _token: $("input[name='_token']").val(),
            text: inputText
        },
        success: function (data) {
            $('#messages').load('#messages .messages-divs')
            $('#message').val('')
        },
    })
})

setInterval(() => {
    let messageCount = $('.messages-divs').length
    $.ajax({
        url: '/api/messages_count',
        method: 'post',
        success: (data) => {
            if (+messageCount !== +data) {
                $('#messages').load('#messages .messages-divs')
            }
        }
    })
}, 1000)
