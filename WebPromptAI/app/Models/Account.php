<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    protected $primaryKey = 'account_id';
    public $incrementing = true;

    protected $fillable = [
        'username', 'email', 'password', 'fullname', 'description', 'avatar', 'role_id'
    ];

    public function role() { return $this->belongsTo(Role::class, 'role_id'); }
    public function promts() { return $this->hasMany(Promt::class, 'account_id'); }
    public function comments() { return $this->hasMany(Comment::class, 'account_id'); }
    public function followers() { return $this->hasMany(Follow::class, 'follower_id'); }
    public function following() { return $this->hasMany(Follow::class, 'following_id'); }
    public function likes() { return $this->hasMany(Like::class, 'account_id'); }
    public function messagesSent() { return $this->hasMany(Message::class, 'sender_id'); }
    public function messagesReceived() { return $this->hasMany(Message::class, 'reciever_id'); }
    public function notifications() { return $this->hasMany(Notification::class, 'account_id'); }
    public function reports() { return $this->hasMany(Report::class, 'account_id'); }
    public function saves() { return $this->hasMany(Save::class, 'account_id'); }
}