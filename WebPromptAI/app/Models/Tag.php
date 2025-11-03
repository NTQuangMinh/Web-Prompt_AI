<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $primaryKey = 'tag_id';

    protected $fillable = ['tag_name', 'description'];

    public function promts() { return $this->belongsToMany(Promt::class, 'promttag', 'tag_id', 'promt_id'); }
}