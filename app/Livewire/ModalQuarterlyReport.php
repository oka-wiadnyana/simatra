<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\MonthlyReport;
use App\Models\QuarterlyReport;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalQuarterlyReport extends Component
{
    use MonthYearTrait;

    public $show=false;
    public $formTitle;
    public $report_id;
    public $quarter;
    public $year;
    public $link;
    public $edit;
    public $quarterlyReportId;
    public $monthYearSelect;

    public function mount(){
        $this->monthYearSelect=$this->monthYear();
    }

    #[On('modal-add-quarterly-report')]
    public function showModalAdd($prop){
        $this->reset('quarter','year','link');
        $this->show=true;
        $this->edit=false;
       
        $this->formTitle="Tambah Laporan";
        $this->report_id=$prop??"";
     
        
    }
    #[On('modal-edit-quarterly-report')]
    public function showModalEdit($prop){
        $this->show=true;
        $this->edit=true;
        $this->formTitle="Edit Laporan";
        $this->quarterlyReportId=$prop??"";
        $dataReport=QuarterlyReport::where('id',$prop)->first();
        $this->quarter=$dataReport->quarter;
        $this->year=$dataReport->year;
        $this->link=$dataReport->link;
      
        
    }
    public function closeModal(){
        $this->show=false;
    }
    public function render()
    {
        
        
        return view('livewire.modal-quarterly-report');
    }
}
