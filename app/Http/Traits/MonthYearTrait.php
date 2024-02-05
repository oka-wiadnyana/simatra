<?php
namespace App\Http\Traits;

use Illuminate\Support\Carbon;

trait MonthYearTrait{
    public function monthYear(){
        $month_array=[];

        for ($i=1; $i <=12 ; $i++) { 
            $month_array[]= ['id'=>$i,'name'=>Carbon::create()->startOfMonth()->month($i)->isoFormat('MMMM')];
        }

               
        $this_year=now()->format('Y');
        $year_array=[];
        for ($i=0; $i <10 ; $i++) { 
            $year_array[]= ['id'=>(int)$this_year-$i,'name'=>(int)$this_year-$i];
        }

        $monthYear=[
            'month'=>collect($month_array),
            'year'=>collect($year_array)
        ];

        return $monthYear;
    }
}