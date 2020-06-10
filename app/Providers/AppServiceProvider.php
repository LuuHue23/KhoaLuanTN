<?php

namespace App\Providers;
use Auth;
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
        View::composer('*', function($view){
            $view->with('currentUser', Auth::user());

            // dd(Auth::user());
        });
        
        // $data['todo']=todo::all();
        // View::share($data);
    }
}
