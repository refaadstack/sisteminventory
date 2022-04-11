<?php

namespace App\Http\Livewire\BarangIn;

use App\Models\BarangIn;
use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.barang-in.index', 
        ['barangIn' => BarangIn::paginate(10)])
        ->extends('backend.master.master')
        ->section('content');
    }

    public function destroy($barangId){
        $barangIn = BarangIn::find($barangId);

        $qty = Barang::find($barangIn->barang_id)->stocks;
        $qty = $qty - $barangIn->jumlah;
        Barang::find($barangIn->barang_id)->update([
            'stocks' => $qty,
        ]);

        $barangIn->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('barangIn.index');
    }
}
