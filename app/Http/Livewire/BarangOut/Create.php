<?php

namespace App\Http\Livewire\BarangOut;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarangOut;
use App\Models\Cart;

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
            'jumlah' => 'required',

        ]);


        $barang = Barang::find($this->barang_id);

        if ($this->jumlah > $barang->stocks) {

            session()->flash('message', 'Jumlah barang yang anda masukkan melebihi stok barang');
            return redirect()->route('barangOut.index');
        }

        else {
            
            $barang->stocks = $barang->stocks - $this->jumlah;
            $barang->save();
               
            $cart = Cart::create([
                'barang_id' => $this->barang_id,
                'user_id' => auth()->user()->id,
                'quantity' => $this->jumlah,
            ]);
        }

        session()->flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('barangOut.index');
    }

    public function cart(){
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.barang-out.cart', ['carts' => $cart]);
    }


}
