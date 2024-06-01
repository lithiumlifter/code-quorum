<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;
    use Likeable;
    protected $guarded = ['id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function saves(): HasMany
    {
        return $this->hasMany(Save::class);
    }
}
