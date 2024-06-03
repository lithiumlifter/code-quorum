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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content_preview', 'like', '%' . $search . '%');
            });
        });
    
        $query->when($filters['tag'] ?? false, function ($query, $tag) {
            return $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('slug', $tag)
                    ->orWhere('name', 'like', '%' . $tag . '%');
            });
        });
    }

    public function scopeAdvancedFilter($query, array $filters)
{
    if (isset($filters['filter'])) {
        foreach ($filters['filter'] as $filter) {
            switch ($filter) {
                case 'noAnswers':
                    $query->whereDoesntHave('answers');
                    break;
                case 'noViews':
                    $query->where('view_count', 0);
                    break;
                case 'mostViews':
                    $query->orderBy('view_count', 'desc');
                    break;
                case 'noLikes':
                    $query->doesntHave('likes');
                    break;
                case 'mostLikes':
                    $query->withCount('likes')->orderBy('likes_count', 'desc');
                    break;
                case 'mostAnswers':
                    $query->withCount('answers')->orderBy('answers_count', 'desc');
                    break;
            }
        }
    }

    if (isset($filters['sort'])) {
        switch ($filters['sort']) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'longest':
                $query->orderBy('created_at', 'asc');
                break;
        }
    }

    if (isset($filters['tagMode']) && $filters['tagMode'] == 'specifiedTags' && !empty($filters['tagQuery'])) {
        $tags = explode(',', $filters['tagQuery']);
        $query->whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('slug', $tags);
        });
    }
}


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
