<?php

namespace App\Http\Livewire\BarangOut;

use App\Models\BarangOut;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads; 

class Edit extends Component
{

    use WithFileUploads;

    public $barangOut_id;
    public  $status;

    public function mount($id)
    {
        $barangOut = BarangOut::find($id);
            if($barangOut){
                $this->barangOut_id = $barangOut->id;
                $this->status = $barangOut->status;
            }
    }        
    public function render()
    {
        return view('livewire.barang-out.edit')->extends('backend.master.master')->section('content');
    }

    public function update()
    {
        $this->validate([
            'status'   => 'required',
        ]);

        $barangOut = BarangOut::find($this->barangOut_id);
        $barangOut->status = $this->status;
        $barangOut->save();


        session()->flash('message', 'Data berhasil diubah');
        return redirect()->route('barangOut.index');

    }

    
}
