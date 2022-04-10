<?php

namespace App\Http\Livewire\Supplier;
use App\Models\Supplier;
use Livewire\Component;

class Edit extends Component
{

    public $supplierId ,$nama_supplier, $alamat, $no_telp, $deskripsi;
   
    public function mount($id)
    {
        $supplier = Supplier::find($id);
        $this->supplierId = $supplier->id;
        $this->nama_supplier = $supplier->nama_supplier;
        $this->alamat = $supplier->alamat;
        $this->no_telp = $supplier->no_telp;
        $this->deskripsi = $supplier->deskripsi;
    }
    public function render()
    {
        return view('livewire.supplier.edit')->extends('backend.master.master')->section('content');
    }


    public function update(){
        $this->validate([
            'nama_supplier'   => 'required',
            'alamat'          => 'required',
            'no_telp'         => 'required',
            'deskripsi'       => 'required',
        ]);
        
        if($this->supplierId){
            $supplier = Supplier::find($this->supplierId);
            
            if($supplier){
                $supplier->update([
                    'nama_supplier'   => $this->nama_supplier,
                    'alamat'          => $this->alamat,
                    'no_telp'         => $this->no_telp,
                    'deskripsi'       => $this->deskripsi,
                ]);
            }
        }
        session()->flash('message', 'Data berhasil diubah');
        return redirect()->route('supplier.index');
    }
}
