<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['report_id', 'prompt_id', 'account_id', 'reason', 'created_at'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'prompt_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}