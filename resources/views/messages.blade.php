@foreach($messages as $msg)
    @php($msg_user = \Illuminate\Support\Facades\DB::table('users')->where('id', '=', $msg->user_id)->get()->first())
    @php($user_avatar = $msg_user->avatar)
    <div class="row p-3 messages-divs">
        <div style="width: 100px;
                height: 100px;
                border-radius: 50%;
                background: url('{{ asset($user_avatar) }}') no-repeat -30px;
                background-size: auto 170%;">
        </div>
        <div class="row col align-self-center">
            <p class="text-black-50 my-1">{{ $msg->created_at->format('j.m.Y | H:i') }}</p>
            <a class="align-self-center fw-bold link-opacity-50-hover link-underline link-underline-opacity-0 link-warning"
               href="{{ route('user', ['user' => $msg_user->id]) }}">
                {{ $msg_user->name }}
            </a>
            <p>{{ $msg->content }}</p>
        </div>
    </div>
@endforeach
