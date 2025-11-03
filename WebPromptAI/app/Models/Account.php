<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Account extends Authenticatable
{
    protected $fillable = ['name', 'email', 'type', 'password', 'avatar', 'bio', 'tiktok_id', 'followers_count', 'following_count'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
