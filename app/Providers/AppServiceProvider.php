<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Department;
use App\Models\FooterLogo;
use App\Models\Social;
use App\Models\Translation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('frontend.*',function(ViewView $view){
            $settings = Translation::pluck('value_'.app()->getLocale(),'key')->toArray();
            $contact = Contact::first();
            $socials = Social::all();
            $footer = FooterLogo::first();
            $departments = Department::limit(6)->get();
            $view->with('settings',$settings);
            $view->with('contact',$contact);
            $view->with('socials',$socials);
            $view->with('footer',$footer);
            $view->with('all_departments',$departments);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
