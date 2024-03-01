<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class About extends Model
{
    use HasFactory;
    protected $fillable = [

        'title1', //العنوان الاول
        'paragraph1', //الفقره الاولى
        'title2', //العنوان الثاني
        'paragraph2', //الفقرة الثانية
        'director_name', //اسمالمدير
        'director_image', //صورة المدير
        'director_info', //عمل المدير
        'language_id', //اللغة
        'hospital_rooms',
        'year_of_experience',
        'happy_patients',
        'qualified_doctor',
        'video',
        'video_bg',
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
