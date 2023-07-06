@foreach($messages->reverse() as $msg)
    @php($msg_user = \Illuminate\Support\Facades\DB::table('users')->where('id', '=', $msg->user_id)->get()->first())
    @php($messages_count = \App\Models\Message::where('user_id', '=', $msg->user_id)->count())
    @php($user_avatar = $msg_user->avatar)
    <div class="row p-3 messages-divs">
        <div class="d-flex justify-content-between align-self-center messages-content__wrapper">
            <div class="d-flex justify-content-between mb-4 messages-content">
                <div class="avatar " data-bs-toggle="modal" data-bs-target="#userModal_{{ $msg->user_id }}">
                    <img src="{{ asset($user_avatar) }}" alt="avatar"
                         class="rounded-circle d-flex align-self-start me-3 shadow" width="60">
                </div>
                <div class="modal fade" id="userModal_{{ $msg->user_id }}" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="userModalLabel">Информация о пользователе</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container mt-3">
                                    <div class="d-flex mt-3">
                                        <img src="{{ asset($msg_user->avatar) }}" alt="User" class="rounded-circle d-flex align-self-start me-3 shadow-sm w-50">
                                        <div class="row m-3">
                                            <p><b>Имя: </b>{{ $msg_user->name }}</p>
                                            <p><b>E-Mail: </b>{{ $msg_user->email }}</p>
                                            <p><b>Сообщений отправлено: </b>{{ $messages_count }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between p-3">
                        <p class="fw-bold mb-0 mx-2 username">{{ $msg_user->name }}</p>
                        <p class="text-muted mb-0 mx-2 my-auto mx-12">{{ $msg->created_at->format('H:i') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            {{ $msg->content }}
                        </p>
                    </div>
                </div>
                <div class="my-auto user-actions">
                    @if($msg->user_id === Auth::user()->id)
                        <div class="row">
                            <form action="#" method="post" id="deleteMessageForm">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" id="deleteUrl" value="{{ route('del', ['id' => $msg->id]) }}">
                                <button class="link-underline link-underline-opacity-0 link-danger btn btn-sm" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            <button
                                class="link-underline link-underline-opacity-0 link-warning btn btn-sm"
                                data-bs-toggle="modal" data-bs-target="#messageModal_{{ $msg->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="modal fade" id="messageModal_{{ $msg->id }}" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="#" class="modal-content" id="editMessageForm" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" id="editUrl" value="{{ route('edit', ['id' => $msg->id]) }}">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="messageModalLabel">Изменить сообщение</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="message-text_{{ $msg->id }}">{{ $msg->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" data-bs-dismiss="modal" class="btn btn-outline-warning">Изменить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
