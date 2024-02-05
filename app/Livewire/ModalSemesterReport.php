<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\MonthlyReport;
use App\Models\QuarterlyReport;
use App\Models\SemesterReport;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalSemesterReport extends Component
{
    use MonthYearTrait;

    public $show=false;
    public $formTitle;
    public $report_id;
    public $semester;
    public $year;
    public $link;
    public $edit;
    public $semesterReportId;
    public $monthYearSelect;

    public function mount(){
        $this->monthYearSelect=$this->monthYear();
    }

    #[On('modal-add-semester-report')]
    public function showModalAdd($prop){
        $this->reset('semester','year','link');
        $this->show=true;
        $this->edit=false;
       
        $this->formTitle="Tambah Laporan";
        $this->report_id=$prop??"";
     
        
    }
    #[On('modal-edit-semester-report')]
    public function showModalEdit($prop){
        $this->show=true;
        $this->edit=true;
        $this->formTitle="Edit Laporan";
        $this->semesterReportId=$prop??"";
        $dataReport=SemesterReport::where('id',$prop)->first();
        $this->semester=$dataReport->semester;
        $this->year=$dataReport->year;
        $this->link=$dataReport->link;
      
        
    }
    public function closeModal(){
        $this->show=false;
    }
    public function render()
    {
        
        
        return view('livewire.modal-semester-report');
    }
}
