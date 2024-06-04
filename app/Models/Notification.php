<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'discussion_id', 'answer_id','liked_by_user_id', 'message', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedByUser()
    {
         return $this->belongsTo(User::class, 'liked_by_user_id');
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
