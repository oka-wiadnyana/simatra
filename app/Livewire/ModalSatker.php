<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\MonthlyReport;
use App\Models\Satker;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalSatker extends Component
{
    use MonthYearTrait;

    public $show=false;
    public $formTitle;
    public $satker_id;
    public $edit;
    

    #[On('modal-add-satker')]
    public function showModalAdd($prop){
       
        $this->show=true;
        $this->edit=false;
       
        $this->formTitle="Tambah Satker";
        $this->satker_id=$prop??"";
     
        
    }
    #[On('modal-edit-satker')]
    public function showModalEdit($prop){
        $this->show=true;
        $this->edit=true;
        $this->formTitle="Edit Satker";
        $this->satker_id=$prop??"";
      
        
    }
    public function closeModal(){
        $this->show=false;
    }
    public function render()
    {
        
        $satker=Satker::find($this->satker_id);
        return view('livewire.modal-satker',['data_satker'=>$satker]);
    }
}
