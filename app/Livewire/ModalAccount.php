<?php

namespace App\Livewire;

use App\Http\Traits\MonthYearTrait;
use App\Models\Level;
use App\Models\MonthlyReport;
use App\Models\Role;
use App\Models\Satker;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalAccount extends Component
{
    use MonthYearTrait;

    public $show=false;
    public $formTitle;
    public $accountId;
    public $edit;
    

    #[On('modal-add-account')]
    public function showModalAdd($prop){
       
        $this->show=true;
        $this->edit=false;
       
        $this->formTitle="Tambah Akun";
        $this->accountId=$prop??"";
     
        
    }
    #[On('modal-edit-account')]
    public function showModalEdit($prop){
        $this->show=true;
        $this->edit=true;
        $this->formTitle="Edit Akun";
        $this->accountId=$prop??"";
      
        
    }
    public function closeModal(){
        $this->show=false;
    }
    public function render()
    {
        $roles=Level::all();
        $satkers=Satker::all();
        $account=User::find($this->accountId);
        return view('livewire.modal-account',['account'=>$account,'roles'=>$roles,'satkers'=>$satkers]);
    }
}
