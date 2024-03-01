<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Home;
use App\Models\User;
use App\Models\About;
use App\Models\Offer;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Header;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Question;
use App\Models\Biography;
use App\Models\ContactUs;
use App\Models\Procedure;
use App\Models\Department;
use App\Models\LanguageDr;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\Description;
use App\Models\EducationDr;
use App\Models\BlogCategory;
use App\Models\SayingPeople;
use App\Models\WeeklyTimetable;
use App\Models\DoctorWorkingHour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];


    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    //جدول الاعدادات
    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class);
    }

    //جدول الاسئلة الشائعة
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    //جدول المدونة
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    //جدول أقسام المدونة
    public function blogCategories(): HasMany
    {
        return $this->hasMany(BlogCategory::class);
    }



    //جدول عرض الحالة قبل وبعد الاجراءات
    public function procedures(): HasMany
    {
        return $this->hasMany(Procedure::class);
    }

    public function logoCarousels(): HasMany
    {
        return $this->hasMany(LogoCarousel::class);
    }



    //عن الموقع
    public function abouts(): HasMany
    {
        return $this->hasMany(About::class);
    }

    public function WeeklyTimetables(): HasMany
    {
        return $this->hasMany(WeeklyTimetable::class);
    }

    //جدول الدكاتره
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }


    //جدول الفروع
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    //خاص بجدول الوصف
    public function descriptions(): HasMany
    {
        return $this->hasMany(Description::class);
    }

    //خاص بجدول الاعلانات بداية الموقع
    public function headers(): HasMany
    {
        return $this->hasMany(Header::class);
    }

    //مواعيد عمل الدكاتره
    public function doctorWorkingHours(): HasMany
    {
        return $this->hasMany(DoctorWorkingHour::class);
    }

    //جدول تعليم الدكتور
    public function educationDrs(): HasMany
    {
        return $this->hasMany(EducationDr::class);
    }

    //جدول السيرة الذاتية للدكتور
    public function biographies(): HasMany
    {
        return $this->hasMany(Biography::class);
    }


    //اقوال الناس عن العيادة
    public function sayingPeople(): HasMany
    {
        return $this->hasMany(SayingPeople::class);
    }
    //جدول الحجوزات
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }


    //جدول معرض الصور
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    //الجدول الخاص بأول فقرة في الصفحة الرئيسية
    public function homes(): HasMany
    {
        return $this->hasMany(Home::class);
    }

    //لغات الدكتور
    public function languageDrs(): HasMany
    {
        return $this->hasMany(LanguageDr::class);
    }

    //جدول التخصصات
    public function specialities(): HasMany
    {
        return $this->hasMany(Speciality::class);
    }

    //جدول اللغات
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }

    //جدول الاقسام
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    //جدول تواصل معنا
    public function ContactUs(): HasMany
    {
        return $this->hasMany(ContactUs::class);
    }
}
