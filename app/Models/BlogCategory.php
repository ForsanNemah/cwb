<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Team;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'language_id',
    ];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class);
    }


    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
