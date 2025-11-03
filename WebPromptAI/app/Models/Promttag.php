<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promttag extends Model
{
    protected $table = 'promttag';

    protected $fillable = ['promt_id', 'tag_id'];

    public function promt() { return $this->belongsTo(Promt::class, 'promt_id'); }
    public function tag() { return $this->belongsTo(Tag::class, 'tag_id'); }
}