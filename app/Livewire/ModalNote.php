<?php

namespace App\Livewire;

use App\Models\MonthlyReport;
use App\Models\QuarterlyReport;
use App\Models\SemesterReport;
use App\Models\YearlyReport;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalNote extends Component
{

    public $show=false;
    public $formTitle;
    public $reportId;
    public $periode;
    public $dataReport;


    #[On('modal-upload-note')]
    public function showModalAdd($prop){
       
        $this->show=true;
        $this->formTitle="Tambah Catatan";
        $breakProp=explode('/',$prop);

        $this->reportId=$breakProp[0];
        $this->periode=$breakProp[1];
        if($this->periode=='bulanan'){
            $this->dataReport=MonthlyReport::find($this->reportId);
        }
        if($this->periode=='caturwulan'){
            $this->dataReport=QuarterlyReport::find($this->reportId);
        }
        if($this->periode=='semester'){
            $this->dataReport=SemesterReport::find($this->reportId);
        }
        if($this->periode=='tahunan'){
            $this->dataReport=YearlyReport::find($this->reportId);
        }

       
     
        
    }

   

    public function closeModal(){
        $this->show=false;
    }

    public function render()
    {

        return view('livewire.modal-note');
    }
}
