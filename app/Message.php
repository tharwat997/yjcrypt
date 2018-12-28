<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'to', 'from', 'message', 'key','subject', 'attempts', 'decrypted', 'attachment', 'extension'
    ];
}
