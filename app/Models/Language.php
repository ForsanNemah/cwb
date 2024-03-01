<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'language_code',
    ];
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
