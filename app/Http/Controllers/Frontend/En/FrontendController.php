<?php

namespace App\Http\Controllers\Frontend\En;

use App\Models\Blog;
use App\Models\Home;
use App\Models\About;
use App\Models\Doctor;
use App\Models\Header;
use App\Models\Setting;
use App\Models\Question;
use App\Models\Biography;
use App\Models\Procedure;
use App\Models\LanguageDr;
use App\Models\Speciality;
use App\Models\Description;
use App\Models\EducationDr;
use App\Models\BlogCategory;
use App\Models\LogoCarousel;
use App\Models\SayingPeople;
use Illuminate\Http\Request;
use App\Models\WeeklyTimetable;
use App\Models\DoctorWorkingHour;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{


    public function indexEN($team_id)
    {
        //جلب محتوى أول فقرة بعد السلايدر
        $home = Home::where('language_id', 2)
            ->where('team_id', $team_id)
            ->latest()->first();

        $headers = Header::where('language_id', 2)
            ->where('team_id', $team_id)
            ->where('block', 1)
            ->get();


        $description = Description::where('language_id', 2)
            ->where('team_id', $team_id)
            ->latest()->first(); //عرض الوصف

        //عن الموقع
        $about = About::where('language_id', 2)
            ->where('team_id', $team_id)
            ->latest()->first(); //عرض عن الموقع

        $WeeklyTimetables = WeeklyTimetable::where('language_id', 2)
            ->where('block', 1)
            ->where('team_id', $team_id)
            ->get(); //عرض الجدول الزمني الاسبوعي


        //عرض الحالة قبل وبعد الاجراء
        $procedure = Procedure::where('language_id', 2)
            ->where('team_id', $team_id)
            ->latest()->first();


        //عرض اراء الناس
        $sayingPeoples = SayingPeople::where('language_id', 2)
            ->where('team_id', $team_id)
            ->get();

        //عرض الاسئلة الشائعة
        $questions = Question::where('language_id', 2)
            ->where('team_id', $team_id)
            ->where('block', 1)
            ->get();

        //عرض الشعارات
        $LogoCarousels = LogoCarousel::where('language_id', 2)
            ->where('team_id', $team_id)
            ->get();

        $blogs = Blog::where('block', 1)
            ->where('language_id', 2)
            ->where('team_id', $team_id)
            ->orderByDesc('id')
            ->limit(3)
            ->get();


        $appSettingEn = Setting::where('language_id', 2)
            ->where('block', 1)
            ->where('team_id',   $team_id)
            ->latest()->first(); //عرض للغة الانجليزية

        return view('frontend.en.index', [
            'home' => $home,
            'about' => $about,
            'WeeklyTimetables' => $WeeklyTimetables,
            'procedure' => $procedure,
            'sayingPeoples' => $sayingPeoples,
            'questions' => $questions,
            'LogoCarousels' => $LogoCarousels,
            'team_id' => $team_id,
            'appSettingEn' => $appSettingEn,
            'blogs' => $blogs,
            'headers' => $headers,
            'description' => $description

        ]);
    }


    //عرض بيانات الدكتور المحدد
    public function viewDoctor($doctor_id, $team_id)
    {

        $description = Description::where('language_id', 2)
            ->where('team_id', $team_id)
            ->latest()->first(); //عرض الوصف


        $appSettingEn = Setting::where('language_id', 2)
            ->where('block', 1)
            ->where('team_id',   $team_id)
            ->latest()->first(); //عرض للغة الانجليزية



        $doctor = Doctor::where('id', $doctor_id)->first(); //
        if ($doctor) {

            $WorkingHours = DoctorWorkingHour::where('doctor_id', $doctor->id)
                ->where('block', 1)
                ->get(); //جلب ساعات عمل الدكتور

            $educationDrs = EducationDr::where('doctor_id', $doctor->id)
                ->where('block', 1)
                ->get(); //جلب تعليم الدكتور

            $Specialities = Speciality::where('doctor_id', $doctor->id)
                ->where('block', 1)
                ->get(); //جلب تخصصات الدكتور

            $languageDrs = LanguageDr::where('doctor_id', $doctor->id)
                ->where('block', 1)
                ->get(); //جلب لغات الدكتور


            $Biographies = Biography::where('doctor_id', $doctor->id)
                ->where('block', 1)
                ->get(); //جلب معلومات  السيرة الذاتية

            return view('frontend.en.doctor-profile', [
                'doctor' => $doctor,
                'WorkingHours' => $WorkingHours,
                'educationDrs' => $educationDrs,
                'Specialities' => $Specialities,
                'languageDrs' => $languageDrs,
                'Biographies' => $Biographies,
                'team_id' => $team_id,
                'description' => $description,
                'appSettingEn' => $appSettingEn

            ]);
        } else {
            return redirect()->back();
        }
    }
    public function viewBlogCategory($blog_category_id, $team_id)
    {

        //عرض أقسام المدونة
        $BlogCategories = BlogCategory::where('language_id', 2)
            ->where('team_id', $team_id)
            ->get();


        // جلب القسم الذي تنتمي له المدونة المحددة
        $BlogCategory = BlogCategory::where('id', $blog_category_id)->first();




        if ($BlogCategory) {

            //جلب جميع المقالات المرتبطة بنفس قسم المدونة المحددة
            $blogs = Blog::where('blog_category_id', $blog_category_id)
                ->where('language_id', $BlogCategory->language_id)
                ->where('block', 1)
                ->get();

            if ($blogs) {

                return view('frontend.en.blog-category-details', [
                    'blogs' => $blogs,
                    'BlogCategory' => $BlogCategory,
                    'team_id' => $team_id,
                    'BlogCategories' => $BlogCategories,
                    // 'blog' => $blog
                ]);
            } else
                return redirect()->back();
        }
    }
    public function viewBlog($blog_id, $team_id)
    {
        //عرض أقسام المدونة
        $BlogCategories = BlogCategory::where('language_id', 2)
            ->where('team_id', $team_id)
            ->get();

        //عرض المدونة المحددة
        $blog = Blog::where('id', $blog_id)
            ->where('block', 1)
            ->first();

        // جلب القسم الذي تنتمي له المدونة المحددة
        $BlogCategory = BlogCategory::where('id', $blog->blog_category_id)->first();

        $blogs = Blog::where('blog_category_id', $blog->blog_category_id)
            ->where('block', 1)
            ->get();

        if ($blog) {

            return view('frontend.en.blog-details', [
                'blogs' => $blogs,
                'BlogCategory' => $BlogCategory,
                'team_id' => $team_id,
                'BlogCategories' => $BlogCategories,
                'blog' => $blog
            ]);
        } else
            return redirect()->back();
    }
}
