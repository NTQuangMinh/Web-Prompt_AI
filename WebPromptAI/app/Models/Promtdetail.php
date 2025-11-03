<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promtdetail extends Model
{
    protected $primaryKey = 'promtdetail_id';

    protected $fillable = ['promt_id', 'title', 'content'];

    public function promt() { return $this->belongsTo(Promt::class, 'promt_id'); }
}