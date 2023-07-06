<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home', ['messages' => Message::latest()->get()]);
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'user_id' => Auth::user()->id,
            'content' => $request['text'],
        ]);
        return redirect()->route('home', ['messages' => Message::latest()->get()]);
    }

    public function deleteMessage(Request $request) {
        $message = Message::where('id', $request['id'])->latest();
        $message->delete();
        $message->save();
        return redirect()->route('home', ['messages' => Message::latest()->get()]);
    }

    public function editMessage(Request $request) {
        $message = Message::where('id', $request['id'])->latest();
        $message->content = $request['text'];
        $message->save();
        return redirect()->route('home', ['messages' => Message::latest()->get()]);
    }
}
