<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogoCarousel extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'language_id',
        'block'
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
