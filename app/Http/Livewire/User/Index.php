<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        return view('livewire.user.index', ['user'=> User::paginate(10)])->extends('backend.master.master')->section('content');
    }
    public function destroy()
    {
        $user = User::find($this->id);
        $user->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('user.index');
    }
}
