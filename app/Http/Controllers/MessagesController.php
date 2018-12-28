<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\Decrypted;
use App\User;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

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

        $message = Message::find($request->data['message_id']); // Gets the message

        $receiverKey = hex2bin($request->data['key']); // Gets the inserted key

        if ($message['key'] == $receiverKey){  //Verifies the inserted Key

            //Message Section

            $encrypter = new Encrypter($receiverKey); //Sets the key after verification into the encrypter

            $decrypted_message = $encrypter->decrypt($message['message']); // Decrypts the message

            //End Message Section

            if ($request->file){ // If the message has an attachment

                //File Section

                $encryptedFile = Storage::get($message['attachment'].'.dat'); // Get Encrypted File

                $decryptedFile = $encrypter->decrypt($encryptedFile); // Decrypt the file

                $fileName = $message['attachment'].'.'.$message['extension'];

                Storage::disk('public')->put($fileName, $decryptedFile); // Store that file with the previous extension

                $filePath = asset('storage/'.$fileName); // Get file path

                //End File Section

                return json_encode(['message' => $decrypted_message, 'file' => $filePath]) ; // returns decrypted message & File

            } else {

                return json_encode(['message' => $decrypted_message]) ; // returns decrypted message only
            }


        } else {
            return response()->json( 'error 401', 401 );  //returns error if the key doesn't match
        }

    }

    public  function attempts($id){
        
            $message = Message::whereid($id)->firstOrFail();  //Gets the message

            $message->attempts = $message->attempts + 1; // Increments the attempts for the message

            $message->save(); // Saves the changes

            if ($message->attempts == 2 ){

                return response()->json(['success'=>false,'result'=>'Incorrect Key, 1 more attempt remaining!']); // 2nd attempt warning


            } else if ($message->attempts >= 3){

                $message->delete(); // Deletes the message on the third failed attempt

                return response()->json(['success'=>true,'result'=>'Incorrect key, the message has been deleted!','url'=> route('home')]);

            }

    }

    public function decryptionSuccess($id){

        $message = Message::whereid($id)->firstOrFail(); // Gets the message

        $message->decrypted = 1;  // sets that the message has been decrypted successfully

        $message->save();  // saves the changes

        $user = User::whereemail($message->from)->first(); // Gets user

        $user->notify(new Decrypted($message->from, $message->to, (string)$message->updated_at)); // Sends notification to sender that the receiver decrypted the message successfully

        return response()->json( 'Message successfully decrypted!'); // returns are message saying that the process if successful

    }

}
