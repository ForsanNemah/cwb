<?php

namespace App\Http\Controllers\Frontend;

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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{


    //عرض الصفحة الرئيسية
    public function index($team_id)
    {
        //عن الموقع
        $about = About::where('language_id', 1)
            ->where('team_id', $team_id)
            ->latest()->first(); //عرض عن الموقع

        $headers = Header::where('language_id', 1)
            ->where('team_id', $team_id)
            ->where(
                'block',
                1
            )->get();


        $WeeklyTimetables = WeeklyTimetable::where('language_id', 1)
            ->where('block', 1)
            ->where('team_id', $team_id)
            ->get(); //عرض الجدول الزمني الاسبوعي

        //عرض اراء الناس
        $sayingPeoples = SayingPeople::where('language_id', 1)
            ->where('team_id', $team_id)
            ->get();


        //جلب محتوى أول فقرة بعد السلايدر
        $home = Home::where('language_id', 1)
            ->where('team_id', $team_id)
            ->latest()->first();

        //عرض الشعارات
        $LogoCarousels = LogoCarousel::where('language_id', 1)
            ->where('team_id', $team_id)
            ->get();

        //عرض الدكاتره في بداية الموقع
        $doctors = Doctor::where('language_id', 1)
            ->where('team_id', $team_id)
            ->get();

        //عرض الاسئلة الشائعة
        $questions = Question::where('language_id', 1)
            ->where('team_id', $team_id)
            ->where('block', 1)
            ->get();

        //عرض الحالة قبل وبعد الاجراء
        $procedure = Procedure::where('language_id', 1)
            ->where('team_id', $team_id)
            ->latest()->first();



        $blogs = Blog::where('block', 1)
            ->where('language_id', 1)
            ->where('team_id', $team_id)
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        $description = Description::where('language_id', 1)
            ->where('team_id', $team_id)
            ->latest()->first(); //عرض الوصف

        $appSettingAr = Setting::where('language_id', 1)
            ->where('block', 1)
            ->where('team_id',   $team_id)
            ->latest()->first(); //عرض للغة العربية

        return view('frontend.index', [
            'about' => $about,
            'WeeklyTimetables' => $WeeklyTimetables,
            'sayingPeoples' => $sayingPeoples,
            'home' => $home,
            'LogoCarousels' => $LogoCarousels,
            'doctors' => $doctors,
            'procedure' => $procedure,
            'questions' => $questions,
            // 'BlogCategories' => $BlogCategories,
            'team_id' => $team_id,
            'blogs' => $blogs,
            'appSettingAr' => $appSettingAr,
            'headers' => $headers,
            'description' => $description


        ]);
    }


    public function viewBlogCategory($blog_category_id, $team_id)
    {

        //عرض أقسام المدونة
        $BlogCategories = BlogCategory::where('language_id', 1)
            ->where('team_id', $team_id)
            ->get();


        // جلب المدونة التي تم تحديدها
        // $blog = Blog::where('blog_category_id', $blog_category_id)
        //     ->where('block', 1)
        //     ->first();


        // جلب القسم الذي تنتمي له المدونة المحددة
        $BlogCategory = BlogCategory::where('id', $blog_category_id)->first();




        if ($BlogCategory) {

            //جلب جميع المقالات المرتبطة بنفس قسم المدونة المحددة
            $blogs = Blog::where('blog_category_id', $blog_category_id)
                ->where('block', 1)
                ->get();

            if ($blogs) {

                return view('frontend.blog-category-details', [
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
        $BlogCategories = BlogCategory::where('language_id', 1)
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

            return view('frontend.blog-details', [
                'blogs' => $blogs,
                'BlogCategory' => $BlogCategory,
                'team_id' => $team_id,
                'BlogCategories' => $BlogCategories,
                'blog' => $blog
            ]);
        } else
            return redirect()->back();
    }


    public function viewDoctor($doctor_id, $team_id)
    {


        $appSettingAr = Setting::where('language_id', 1)
            ->where('block', 1)
            ->where('team_id',   $team_id)
            ->latest()->first(); //عرض للغة العربية

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

            $description = Description::where('language_id', 1)
                ->where('team_id', $team_id)
                ->latest()->first(); //عرض الوصف

            return view('frontend.doctor-profile', [
                'doctor' => $doctor,
                'WorkingHours' => $WorkingHours,
                'educationDrs' => $educationDrs,
                'Specialities' => $Specialities,
                'languageDrs' => $languageDrs,
                'Biographies' => $Biographies,
                'team_id' => $team_id,
                'description' => $description,
                'appSettingAr'=> $appSettingAr

            ]);
        } else {
            return redirect()->back();
        }
    }
}
