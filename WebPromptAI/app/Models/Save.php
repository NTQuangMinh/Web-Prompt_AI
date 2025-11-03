<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $primaryKey = 'save_id';

    protected $fillable = ['promt_id', 'account_id', 'created_at'];

    public function promt() { return $this->belongsTo(Promt::class, 'promt_id'); }
    public function account() { return $this->belongsTo(Account::class, 'account_id'); }
}