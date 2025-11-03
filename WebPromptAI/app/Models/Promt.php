<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promt extends Model
{
    protected $table = 'promt';
    protected $primaryKey = 'promt_id';

    protected $fillable = [
        'account_id', 'title', 'content', 'status', 'created_at', 'updated_at', 'image', 'likes_count', 'comments_count'
    ];

    public function account() { return $this->belongsTo(Account::class, 'account_id'); }
    public function details() { return $this->hasMany(Promtdetail::class, 'promt_id'); }
    public function tags() { return $this->belongsToMany(Tag::class, 'promttag', 'promt_id', 'tag_id'); }
    public function comments() { return $this->hasMany(Comment::class, 'promt_id'); }
    public function likes() { return $this->hasMany(Like::class, 'promt_id'); }
    public function reports() { return $this->hasMany(Report::class, 'promt_id'); }
    public function saves() { return $this->hasMany(Save::class, 'promt_id'); }
}