@foreach($messages->reverse() as $msg)
    @php($msg_user = \Illuminate\Support\Facades\DB::table('users')->where('id', '=', $msg->user_id)->get()->first())
    @php($user_avatar = $msg_user->avatar)
    <div class="row p-3 messages-divs">
        <div class="d-flex justify-content-between align-self-center">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('user', ['user' => $msg_user->id]) }}">
                    <img src="{{ asset($user_avatar) }}" alt="avatar"
                         class="rounded-circle d-flex align-self-start me-3 shadow-sm" width="60">
                </a>

                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between p-3">
                        <a href="{{ route('user', ['user' => $msg_user->id]) }}" class="fw-bold mb-0 mx-2 text-black link-underline link-underline-opacity-0">{{ $msg_user->name }}</a>
                        <p class="text-muted small mb-0 mx-2">{{ $msg->created_at->format('H:i') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            {{ $msg->content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
