<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Save extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }
}
