<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;
    protected $fillable = [
        'title1',
        'paragraph1',
        'image1',
        'title2',
        'paragraph2',
        'image2',
        'title3',
        'paragraph3',
        'image3',
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
