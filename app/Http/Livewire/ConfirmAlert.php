<?php

namespace App\Http\Livewire;
use App\Models\Barang;  
use Livewire\Component;

class ConfirmAlert extends Component
{
    public $confirmId;

    public function render()
    {
        return view('livewire.confirm-alert');
    }
    public function destroy($id){
        Barang::find($id)->delete();
    }
}
