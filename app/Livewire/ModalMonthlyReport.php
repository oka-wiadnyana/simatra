<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\MonthlyReport;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalMonthlyReport extends Component
{
    use MonthYearTrait;

    public $show=false;
    public $formTitle;
    public $report_id;
    public $month;
    public $year;
    public $link;
    public $edit;
    public $monthlyReportId;
    public $monthYearSelect;

    public function mount(){
        $this->monthYearSelect=$this->monthYear();
    }

    #[On('modal-add-monthly-report')]
    public function showModalAdd($prop){
        $this->reset('month','year','link');
        $this->show=true;
        $this->edit=false;
       
        $this->formTitle="Tambah Laporan";
        $this->report_id=$prop??"";
     
        
    }
    #[On('modal-edit-monthly-report')]
    public function showModalEdit($prop){
        $this->show=true;
        $this->edit=true;
        $this->formTitle="Edit Laporan";
        $this->monthlyReportId=$prop??"";
        $dataReport=MonthlyReport::where('id',$prop)->first();
        $this->month=$dataReport->month;
        $this->year=$dataReport->year;
        $this->link=$dataReport->link;
      
        
    }
    public function closeModal(){
        $this->show=false;
    }
    public function render()
    {
        
        
        return view('livewire.modal-monthly-report');
    }
}
