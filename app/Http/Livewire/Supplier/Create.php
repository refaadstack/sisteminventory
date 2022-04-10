<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;

use Livewire\Component;

class Create extends Component
{
    public $nama_supplier,  $alamat, $no_telp, $deskripsi;

    public function store(){
        $this->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'deskripsi' => 'required',
        ]);

        $supplier = Supplier::create([
            'nama_supplier' => $this->nama_supplier,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('supplier.index');
    }
    public function render()
    {
        return view('livewire.supplier.create')->extends('backend.master.master')->section('content');
    }
}
