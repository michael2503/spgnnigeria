<?php

namespace App\Providers;

use App\Models\PhotoGallery;
use App\Models\SocialLink;
use App\Models\WebsiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $webSet = WebsiteSetting::first();
        $socialLinks = SocialLink::get();
        $sixPhotos = PhotoGallery::take(6)->orderBy('id', 'DESC')->get();
        View::share([
            'webSet' => $webSet,
            'socialLinks' => $socialLinks,
            'sixPhotos' => $sixPhotos
        ]);

        Paginator::useBootstrap();

    }
}
