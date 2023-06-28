@foreach($messages as $msg)
    @php($msg_user = \Illuminate\Support\Facades\DB::table('users')->where('id', '=', $msg->user_id)->get()->first())
    <div class="row p-3 messages-divs">
        <img src="{{ asset('default_avatar.png') }}" alt="User" style="max-width: 120px; min-width: 80px" class="col align-self-start col-2">
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
