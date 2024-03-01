<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//جدول اعدادات الموقع
class Setting extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'email',
        'address',
        'phone1',
        'phone2',
        'logo',
        'icon',
        'facebook',
        'instagram',
        'twitter',
        'pinterest',
        'language_id',
        'block',
        'short_des_footer',
        'google_map'


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
