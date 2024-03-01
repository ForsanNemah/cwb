<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procedure extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'description',
        'before',
        'after',
        'language_id',
    ];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
