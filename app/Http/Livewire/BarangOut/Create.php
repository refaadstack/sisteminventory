<?php

namespace App\Http\Livewire\BarangOut;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarangOut;

class Create extends Component
{

    public $barang_id;
    public $nama_pembeli;
    public $tanggal_keluar;
    public $jumlah;
    public $status;

    public function render()
    {
        return view('livewire.barang-out.create',['barangs' => Barang::all()])->extends('backend.master.master')->section('content');
    }

    public function store()
    {
        $this->validate([
            'barang_id' => 'required',
            'nama_pembeli' => 'required',
            'tanggal_keluar' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);


        $barang = Barang::find($this->barang_id);

        if ($this->jumlah > $barang->stocks) {

            session()->flash('message', 'Jumlah barang yang anda masukkan melebihi stok barang');
            return redirect()->route('barangOut.create');
        }

        else {
            
            $barang->stocks = $barang->stocks - $this->jumlah;
            $barang->save();
               
            $barangOut = BarangOut::create([
                'barang_id' => $this->barang_id,
                'nama_pembeli' => $this->nama_pembeli,
                'tanggal_keluar' => $this->tanggal_keluar,
                'jumlah' => $this->jumlah,
                'status' => $this->status,
            ]);
        }

        session()->flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('barangOut.index');
    }


}
