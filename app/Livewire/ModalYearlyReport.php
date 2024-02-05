<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\MonthlyReport;
use App\Models\QuarterlyReport;
use App\Models\YearlyReport;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalYearlyReport extends Component
{
    use MonthYearTrait;

    public $show=false;
    public $formTitle;
    public $report_id;
   
    public $year;
    public $link;
    public $edit;
    public $yearlyReportId;
    public $monthYearSelect;

    public function mount(){
        $this->monthYearSelect=$this->monthYear();
    }

    #[On('modal-add-yearly-report')]
    public function showModalAdd($prop){
        $this->reset('year','link');
        $this->show=true;
        $this->edit=false;
       
        $this->formTitle="Tambah Laporan";
        $this->report_id=$prop??"";
     
        
    }
    #[On('modal-edit-yearly-report')]
    public function showModalEdit($prop){
        $this->show=true;
        $this->edit=true;
        $this->formTitle="Edit Laporan";
        $this->yearlyReportId=$prop??"";
        $dataReport=YearlyReport::where('id',$prop)->first();
    
        $this->year=$dataReport->year;
        $this->link=$dataReport->link;
      
        
    }
    public function closeModal(){
        $this->show=false;
    }
    public function render()
    {
        
        
        return view('livewire.modal-yearly-report');
    }
}
