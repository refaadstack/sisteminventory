<?php

namespace App\Http\Livewire\BarangOut;

use App\Models\Barang;
use App\Models\BarangOut;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.barang-out.index', ['barangOut' => BarangOut::paginate(10)])->extends('backend.master.master')->section('content');
    }

    public function destroy($id)
    {
        $barangOut = BarangOut::find($id);

        $qty = Barang::find($barangOut->barang_id)->stocks;
        $qty = $qty + $barangOut->jumlah;
        Barang::find($barangOut->barang_id)->update([
            'stocks' => $qty,
        ]);


        $barangOut->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('barangOut.index');
    }
}
