<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Branch;
use App\Models\Language;
use App\Models\Department;
use App\Models\LanguageDr;
use App\Models\Speciality;
use App\Models\EducationDr;
use App\Models\DoctorWorkingHour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'email',
        'image',
        'phone',
        'address',
        'speciality',
        'department_id',
        'branch_id',
        'instagram',
        'facebook',
        'twitter',
        'pinterest',
        'dribbble',
        'experience',
        'types_of',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
    //مواعيد عمل الدكاتره
    public function doctor_working_hour(): HasMany
    {
        return $this->hasMany(DoctorWorkingHour::class);
    }

    //جدول تعليم الدكتور
    public function education_dr(): HasMany
    {
        return $this->hasMany(EducationDr::class);
    }

    //جدول التخصصات
    public function speciality(): HasMany
    {
        return $this->hasMany(Speciality::class);
    }

    //لغات الدكتور
    public function language_dr(): HasMany
    {
        return $this->hasMany(LanguageDr::class);
    }
}
