<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Gallery;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'icon',
        'image',
        'short_des',
        'block',
        'description',
        'language_id'
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
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
