<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\BarangIn;
use App\Models\BarangOut;
use PDF;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportBarang(){
        $barang = Barang::all();
        $pdf = PDF::loadview('export.barang', ['barang' => $barang]);
        return $pdf->stream('barang.pdf');
    }
    public function exportBarangIn(){
        $barangIn = BarangIn::all();
        $pdf = PDF::loadview('export.barangIn', ['barangIn' => $barangIn]);
        return $pdf->stream('barang-masuk.pdf');
    }
    public function exportBarangOut(){
        $barangOut = BarangOut::all();
        $pdf = PDF::loadview('export.barangOut', ['barangOut' => $barangOut]);
        return $pdf->stream('barang-keluar.pdf');
    }
    public function exportSupplier(){
        $supplier = Supplier::all();
        $pdf = PDF::loadview('export.supplier', ['supplier' => $supplier]);
        return $pdf->stream('supplier.pdf');
    }
}
