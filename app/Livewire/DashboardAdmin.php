<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\MonthlyReport;
use App\Models\QuarterlyReport;
use App\Models\ReportType;
use App\Models\Satker;
use App\Models\SemesterReport;
use App\Models\YearlyReport;
use Illuminate\Support\Carbon;
use Livewire\Component;

class DashboardAdmin extends Component
{
    use MonthYearTrait;

    public $month="";
    public $year="";
    public $quarter="I";
    public $quarterlyYear="";
    public $semester="I";
    public $semesterYear="";
    public $yearlyYear="";
    public $monthlyReport;
    public $monthlyData=[];
    public $monthYearSelect;
    public $quarterlyReport;
    public $quarterlyData=[];
    public $semesterReport;
    public $semesterData=[];
    public $yearlyReport;
    public $yearlyData=[];
    

    public function mount(){
        $this->monthYearSelect=$this->monthYear();
        $this->monthlyReport=ReportType::where('periode','bulanan')->get();
        $monthlyReportData=MonthlyReport::where('month',Carbon::now()->format('n'))->where('year',Carbon::now()->format('Y'))->get();
        $satker=Satker::all();
                
        foreach($satker as $s){
            $dataPerSatker=$monthlyReportData->where('satker_id',$s->id);
          
            $this->monthlyData[$s->nick_name]=$dataPerSatker;
        }


        $this->quarterlyReport=ReportType::where('periode','caturwulan')->get();
        $quarterlyReportData=QuarterlyReport::where('quarter','I')->where('year',Carbon::now()->format('Y'))->get();

        $this->quarterlyYear=Carbon::now()->format('Y');
        foreach($satker as $s){
            $dataPerSatker=$quarterlyReportData->where('satker_id',$s->id);
          
            $this->quarterlyData[$s->nick_name]=$dataPerSatker;
        }

        $this->semesterReport=ReportType::where('periode','semester')->get();
        $semesterReportData=SemesterReport::where('semester','I')->where('year',Carbon::now()->format('Y'))->get();

        $this->semesterYear=Carbon::now()->format('Y');
        foreach($satker as $s){
            $dataPerSatker=$semesterReportData->where('satker_id',$s->id);
          
            $this->semesterData[$s->nick_name]=$dataPerSatker;
        }

        $this->yearlyReport=ReportType::where('periode','tahunan')->get();
        $semesterReportData=YearlyReport::where('year',Carbon::now()->format('Y'))->get();

        $this->yearlyYear=Carbon::now()->format('Y');
        foreach($satker as $s){
            $dataPerSatker=$semesterReportData->where('satker_id',$s->id);
          
            $this->yearlyData[$s->nick_name]=$dataPerSatker;
        }
    }


    public function findData(){

       

        $monthlyReportData=MonthlyReport::where('month',$this->month)->where('year',$this->year)->get();
        $satker=Satker::all();

        
        foreach($satker as $s){
            $dataPerSatker=$monthlyReportData->where('satker_id',$s->id);
          
            $this->monthlyData[$s->nick_name]=$dataPerSatker;
        }

        
    }

    public function findDataQuarterly(){

       

        
        $satker=Satker::all();

        $this->quarterlyReport=ReportType::where('periode','caturwulan')->get();
        $quarterlyReportData=QuarterlyReport::where('quarter',$this->quarter)->where('year',$this->quarterlyYear)->get();

        foreach($satker as $s){
            $dataPerSatker=$quarterlyReportData->where('satker_id',$s->id);
          
            $this->quarterlyData[$s->nick_name]=$dataPerSatker;
        }
    }

    public function findDataSemester(){

       

        
        $satker=Satker::all();

        $this->semesterReport=ReportType::where('periode','semester')->get();
        $semesterReportData=SemesterReport::where('semester',$this->semester)->where('year',$this->semesterYear)->get();

        foreach($satker as $s){
            $dataPerSatker=$semesterReportData->where('satker_id',$s->id);
          
            $this->semesterData[$s->nick_name]=$dataPerSatker;
        }
    }

    public function findDataYearly(){

       

        
        $satker=Satker::all();

        $this->yearlyReport=ReportType::where('periode','tahunan')->get();
        $yearlyReportData=YearlyReport::where('year',$this->yearlyYear)->get();

        foreach($satker as $s){
            $dataPerSatker=$yearlyReportData->where('satker_id',$s->id);
          
            $this->yearlyData[$s->nick_name]=$dataPerSatker;
        }
    }

    public function render()
    {

         
        return view('livewire.dashboard-admin');
    }
}
