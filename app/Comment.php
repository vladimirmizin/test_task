<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'comment',
        'parent_id',
        'created_at',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function sub_comments()
    {
        return $this->hasMany(Comment::class, 'parent_id')
            ->orderByDesc('created_at');
    }
}
