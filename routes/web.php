<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\QuarterlyReportController;
use App\Http\Controllers\SemesterReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\YearlyReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/attempt_login',[LoginController::class,'attemptLogin']);
});

Route::middleware('auth')->group(function(){
    Route::controller(LoginController::class)->group(function () {
        Route::get('/logout', 'logout');
        Route::get('/daftar_akun', 'daftarAkun');
        Route::get('/get_daftar_akun', 'getDaftarAkun');
        Route::post('/insert_akun', 'insertAkun');
        Route::post('/edit_akun', 'editAkun');
        Route::post('/delete_akun', 'deleteAkun');

       
    });
    
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/','index');
    });
    
    Route::controller(MonthlyReportController::class)->group(function(){
        Route::get('monthly_report/{report_id}','index');
        Route::get('get_monthly_report/{report_id}','getMonthlyReport');
        Route::post('insert_monthly_report','insertMonthlyReport');
        Route::post('delete_monthly_report','deleteMonthlyReport');
        // admin
        Route::get('monthly_report_satker/{satker_id}/{periode}','admin');
        Route::get('get_monthly_report_satker/{satker_id}/{report_id}','getMonthlyReportSatker');
        Route::post('bulanan/insert_note','insertNote');
        Route::post('delete-monthly-note','deleteNote');
    });
    
    Route::controller(QuarterlyReportController::class)->group(function(){
        Route::get('quarterly_report/{report_id}','index');
        Route::get('get_quarterly_report/{report_id}','getQuarterlyReport');
        Route::post('insert_quarterly_report','insertQuarterlyReport');
        Route::post('delete_quarterly_report','deleteQuarterlyReport');
         // admin
         Route::get('quarterly_report_satker/{satker_id}/{periode}','admin');
         Route::get('get_quarterly_report_satker/{satker_id}/{report_id}','getQuarterlyReportSatker');
         Route::post('caturwulan/insert_note','insertNote');
        Route::post('delete-quarterly-note','deleteNote');
    });
    
    Route::controller(SemesterReportController::class)->group(function(){
        Route::get('semester_report/{report_id}','index');
        Route::get('get_semester_report/{report_id}','getSemesterReport');
        Route::post('insert_semester_report','insertSemesterReport');
        Route::post('delete_semester_report','deleteSemesterReport');
        // admin
        Route::get('semester_report_satker/{satker_id}/{periode}','admin');
        Route::get('get_semester_report_satker/{satker_id}/{report_id}','getSemesterReportSatker');
        Route::post('semester/insert_note','insertNote');
        Route::post('delete-semester-note','deleteNote');
    });
    Route::controller(YearlyReportController::class)->group(function(){
        Route::get('yearly_report/{report_id}','index');
        Route::get('get_yearly_report/{report_id}','getYearlyReport');
        Route::post('insert_yearly_report','insertYearlyReport');
        Route::post('delete_yearly_report','deleteYearlyReport');
         // admin
         Route::get('yearly_report_satker/{satker_id}/{periode}','admin');
         Route::get('get_yearly_report_satker/{satker_id}/{report_id}','getYearlyReportSatker');
         Route::post('tahunan/insert_note','insertNote');
         Route::post('delete-yearly-note','deleteNote');
        
    });
    Route::controller(SettingController::class)->group(function(){
        Route::get('setting/satker','satker');
        Route::post('setting/insert_satker','insertSatker');
        Route::post('setting/delete_satker','deleteSatker');
        Route::get('setting/account','account');
        Route::post('setting/insert_account','insertAccount');
        Route::post('setting/delete_account','deleteAccount');
      
    });
});

