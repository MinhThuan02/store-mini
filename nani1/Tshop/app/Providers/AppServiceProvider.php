<?php

namespace App\Providers;
use App\Models\categories; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use DB;
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
    // public function boot(): void
    // {
    //     view()->composer('*', function ($view){
    //         // Paginator::useBootstrap();
    //         // $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit(5)->get();
          
    //         $categories = categories::all();
    //         $view ->with(compact('categories_hot','categories'));
    //     });
    // }
    

    
}
