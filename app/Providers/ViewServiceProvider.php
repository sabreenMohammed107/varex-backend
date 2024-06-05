<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\ContactUs;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            $contactUsFirstRow = ContactUs::first();
            $categoriesOrderedByRank = Category::withCount('products')->orderBy('rank')->get();

            $view->with('contactUsFirstRow', $contactUsFirstRow)
                 ->with('categoriesOrderedByRank', $categoriesOrderedByRank);
        });
    }
}
