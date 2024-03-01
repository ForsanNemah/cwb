<?php

namespace App\Providers;


use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

        // $websiteSetting = Setting::where('language_id', 1)
        //     ->where('block', 1)
        //     ->latest()->first(); //عرض للغة العربية
        // View::share('appSetting', $websiteSetting);

        // $websiteSettingEn = Setting::where('language_id', 2)
        //     ->where('block', 1)
        //     ->latest()->first(); //عرض للغة العربية
        // View::share('appSettingEn', $websiteSettingEn);
    }
}
