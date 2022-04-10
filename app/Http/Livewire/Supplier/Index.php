<?php

namespace App\Http\Livewire\Supplier;
use App\Models\Supplier;
use Livewire\WithPagination;
use Livewire\Component;

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

        if($supplier){
            $supplier->delete();
        }

        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('supplier.index');
    }
}
