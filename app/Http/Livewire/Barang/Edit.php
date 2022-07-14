<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads; 

class Edit extends Component
{

    use WithFileUploads;

    public  $barang_id,
            $nama_barang, 
            $harga,
            $stocks,
            $kategori,
            $berat, 
            $gambar,
            $deskripsi;

    public function mount($id)
    {
        $barang = Barang::find($id);
            if($barang){
                $this->barang_id = $barang->id;
                $this->nama_barang = $barang->nama_barang;
                $this->kategori = $barang->kategori;
                $this->harga = $barang->harga;
                $this->stocks = $barang->stocks;
                $this->berat = $barang->berat;
                $this->gambar = $barang->gambar;
                $this->deskripsi = $barang->deskripsi;
            }
    }        
    public function render()
    {
        return view('livewire.barang.edit')->extends('backend.master.master')->section('content');
    }

    public function update()
    {
        $this->validate([
            'nama_barang'   => 'required',
            'harga'         => 'required',
            'kategori'      => 'required',
            'stocks'          => 'required',
            'berat'         => 'required',
            'gambar'        => 'required',
            'deskripsi'     => 'required',
        ]);

        // update gambar with livewire component
        if($this->gambar){

            $oldFilename = $this->gambar;
            Storage::delete($oldFilename);
            $filename = $this->gambar;

            $filename = md5($this->gambar->getClientOriginalName() . time()) . '.' . $this->gambar->getClientOriginalExtension();
            
            $destinationPath = 'gambar';
            $filename = $this->gambar->storeAs($destinationPath, $filename, 'public');
        }       
        

        if($this->barang_id){
            $barang = Barang::find($this->barang_id);

            if($barang){
                $barang->update([
                    'nama_barang'   => $this->nama_barang,
                    'harga'         => $this->harga,
                    'kategori'      => $this->kategori,
                    'stocks'        => $this->stocks,
                    'berat'         => $this->berat,
                    'gambar'        => $filename,
                    'deskripsi'     => $this->deskripsi,
                ]);
            }
        }

        session()->flash('message', 'Data berhasil diubah');
        return redirect()->route('barang.index');

    }

    
}
