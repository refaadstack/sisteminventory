<?php

namespace App\Http\Livewire\Supplier;
use App\Models\Supplier;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\BarangIn;
use App\Models\Barang;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.supplier.index', ['suppliers' => Supplier::paginate(10)])
        ->extends('backend.master.master')
        ->section('content');

    }
    public function destroy($supplierId){
        $supplier = Supplier::find($supplierId);
        $barangIn = BarangIn::with('supplier')->where('supplier_id', $supplierId)->get();
        foreach ($barangIn as $key => $value) {
            $qty = Barang::find($value->barang_id)->stocks;
            $qty = $qty - $value->jumlah;
            Barang::find($value->barang_id)->update([
                'stocks' => $qty,
            ]);
        }


        $supplier->barangIn()->delete();

        if($supplier){
            $supplier->delete();
        }


        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('supplier.index');
    }
}
