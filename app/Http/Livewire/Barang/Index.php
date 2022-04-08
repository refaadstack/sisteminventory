<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.barang.index', [
            'barang' => Barang::paginate(10)
        ])
        ->extends('backend.master.master')
        ->section('content');

    }

    public function destroy($postId){
        $barang = Barang::find($postId);

        if($barang){
            $barang->delete();
            Storage::delete($barang->gambar);
            
        }

        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('barang.index');
    }
}
