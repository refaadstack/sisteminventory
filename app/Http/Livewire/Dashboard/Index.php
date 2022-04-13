<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\BarangIn;
use App\Models\BarangOut;
use App\Models\Barang;

class Index extends Component
{
    public function render()
    {
        $totalAdmin = User::where('role', 'admin')->count();
        $totalBarangMasuk = BarangIn::count();
        $totalBarangKeluar = BarangOut::count();
        $totalBarang = Barang::count();
        return view('livewire.dashboard.index',compact(['totalAdmin','totalBarangMasuk','totalBarangKeluar','totalBarang']))->extends('backend.master.master')->section('content');
    }
}
