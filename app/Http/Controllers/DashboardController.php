<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $breadcrumbList=[
            'Admin',
            'Laporan'
        ];
        return view('dashboard',['breadcrumbList'=>$breadcrumbList]);
    }
}
