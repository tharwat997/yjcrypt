<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Encryption\Encrypter;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ComposeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $cipher = 'AES-128-CBC';

        $key = Encrypter::generateKey($cipher);

        return view('dashboard.compose')->with('key', $key);
    }

    public function store(Request $request){

        $key = hex2bin($request->key);

        $encrypter = new Encrypter($key); // Setting Custom Key

        $encrpyted_message = $encrypter->encrypt($request->message); // Message Encryption

        $user = User::whereemail($request->to)->firstorFail(); // Getting User to send to //Todo Validate the request because when the user is not found it displays an error

        Message::create([
            'to' => $user->email,
            'subject'=> $request->subject,
            'from' => Auth::user()->email,
            'message'=> $encrpyted_message,
            'key'=> $key,

        ]);

        return back();

    }

}
