<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = ['promt_id', 'account_id', 'content', 'created_at'];

    public function promt() { return $this->belongsTo(Promt::class, 'promt_id'); }
    public function account() { return $this->belongsTo(Account::class, 'account_id'); }
}