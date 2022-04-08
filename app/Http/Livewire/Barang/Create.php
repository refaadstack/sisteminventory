<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;    

class Create extends Component
{
    use WithFileUploads; 

    public $nama_barang;
    public $harga;
    public $stocks;
    public $gambar;
    public $berat;
    public $deskripsi;
    
    public function store(){
        
        $this->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stocks' => 'required',
            'gambar' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
        ]);
        
        $filename = md5($this->gambar->getClientOriginalName() . time()) . '.' . $this->gambar->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('gambar', $this->gambar, $filename);
        
        $barang = Barang::create([
            'nama_barang' => $this->nama_barang,
            'harga' => $this->harga,
            'stocks' => $this->stocks,
            'berat' => $this->berat,
            'gambar' => $filename,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('barang.index');
        
    }

    public function render()
    {
        return view('livewire.barang.create')->extends('backend.master.master')->section('content');
    }
}
