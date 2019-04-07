<?php


namespace App\Providers;

use Illuminate\Support\Facades\Route;

class AdminServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\Admin';


    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::prefix('admin')->middleware('web')->name('admin.')->namespace($this->namespace)->group(base_path('routes/admin.php'));
    }
}
