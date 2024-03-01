<?php

namespace App\Models;

use App\Models\Team;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'keywords',
        'content',
        'blog_category_id',
        'block',
        'language_id'
    ];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
