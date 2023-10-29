<?php
 
namespace App\Providers;
 
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer('pagina-inicial', ProfileComposer::class);
 
        // Using closure based composers...
        Facades\View::composer('teste', function (View $view) {
            $view->with('abc', 'def');
        });
 
        Facades\View::composer('dashboard', function (View $view) {
            // ...
        });
    }
}