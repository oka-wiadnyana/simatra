<?php

namespace App\Providers;

use App\Models\ReportType;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DataViewProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $menuLaporan=ReportType::all();
       
        View::share('menuLaporan',$menuLaporan);

        

    }
}
