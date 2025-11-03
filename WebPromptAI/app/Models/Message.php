<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primaryKey = 'message_id';

    protected $fillable = ['sender_id', 'reciever_id', 'content', 'created_at'];

    public function sender() { return $this->belongsTo(Account::class, 'sender_id'); }
    public function reciever() { return $this->belongsTo(Account::class, 'reciever_id'); }
}