<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $primaryKey = 'notification_id';

    protected $fillable = ['account_id', 'promt_id', 'type', 'content', 'is_read', 'created_at'];

    public function account() { return $this->belongsTo(Account::class, 'account_id'); }
    public function promt() { return $this->belongsTo(Promt::class, 'promt_id'); }
}