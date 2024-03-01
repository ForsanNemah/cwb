<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Doctor;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


//مواعيد عمل الدكاتره
class DoctorWorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'for_hour',
        'to_hour',
        'doctor_id',
        'block'
    ];

    // public function language()
    // {
    //     return $this->belongsTo(Language::class);
    // }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
