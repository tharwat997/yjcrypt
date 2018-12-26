<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($id){

        $message = Message::find($id);

        return view('dashboard.message_view', compact('message'));
    }

    public function decrypt(Request $request){


        $message = Message::find($request->data['message_id']);

        $receiverKey = hex2bin($request->data['key']);

        if ($message['key'] == $receiverKey){


            $encrypter = new Encrypter($receiverKey);

            $decrypted_message = $encrypter->decrypt($message['message']);

            return $decrypted_message;

        } else {
            return 1;
        }

    }

}
