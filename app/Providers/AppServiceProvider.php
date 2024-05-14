<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cont = Setting::first();
        // dd($cont);
        view()->share('contact', $cont);

        // $allcategories=[];
        $allcategories = Category::with('courses')->has('courses')->get();
        // dd($allcategories);
        // $allcategories= Category::where('id',$item->categoryId)->first();
        view()->share('allcategories', $allcategories);
    }
}
