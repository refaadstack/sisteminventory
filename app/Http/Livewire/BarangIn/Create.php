<?php

namespace App\Http\Livewire\BarangIn;

use App\Models\BarangIn;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $barang_id ;
    public $supplier_id ;
    public $tanggal_masuk;
    public $jumlah;
    public $user_id;
    
    public function store(){    
            $this->validate([
                'barang_id' => 'required',
                'supplier_id' => 'required',
                'tanggal_masuk' => 'required',
                'jumlah' => 'required',
                // 'user_id' => 'required',
            ]);
            
            $barangIn = BarangIn::create([
                'barang_id' => $this->barang_id,
                'supplier_id' => $this->supplier_id,
                'tanggal_masuk' => $this->tanggal_masuk,
                'jumlah' => $this->jumlah,
                'user_id' => Auth::user()->id,
            ]);

            $qty = Barang::find($this->barang_id)->stocks;
            $qty = $qty + $this->jumlah;
            Barang::find($this->barang_id)->update([
                'stocks' => $qty,
            ]);
            
            session()->flash('message', 'Data berhasil ditambahkan');
            return redirect()->route('barangIn.index');
    }

    public function render()
    {
        return view('livewire.barang-in.create',
        ['barangs' => Barang::all(),
        'suppliers' => Supplier::all()])
        ->extends('backend.master.master')
        ->section('content');
    }
}
