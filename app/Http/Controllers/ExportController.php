<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\BarangIn;
use App\Models\BarangOut;
use App\Models\Penjualan;
use DB;
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
    public function notaKeluar($id){
        $nota = DB::table('penjualans')
        ->join('barang_outs', 'penjualans.barangOut_id', '=', 'barang_outs.id')
        ->join('barangs', 'penjualans.barang_id', '=', 'barangs.id')
        ->select('barang_outs.*',
                'barangs.nama_barang',
                'barangs.harga',
                'penjualans.barang_id',
                'penjualans.user_id')
        ->where('barang_outs.id', $id)->get();
        // dd($nota);

        $data_pembeli = BarangOut::find($id);
        $pdf = PDF::loadview('export.notaKeluar', ['nota' => $nota,'data_pembeli' => $data_pembeli]);
        return $pdf->stream('nota-keluar.pdf');
    }
}
