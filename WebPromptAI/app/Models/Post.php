<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'prompt_id', 'account_id', 'title', 'status', 'created_at', 'component_name', 'content',
        'short_description', 'order', 'image'
    ];

    protected $casts = ['topics' => 'array'];  // Cho JSON topics nếu cần

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}