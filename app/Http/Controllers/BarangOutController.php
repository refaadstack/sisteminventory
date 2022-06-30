<?php

namespace App\Http\Controllers;

use App\Models\BarangOut;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_out = BarangOut::all();
        return view('backend.barangout.index', compact(['barang_out']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangOut  $barangOut
     * @return \Illuminate\Http\Response
     */
    public function show(BarangOut $barangOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangOut  $barangOut
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangOut $barangOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangOut  $barangOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangOut $barangOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangOut  $barangOut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangOut= BarangOut::findOrFail($id);
        $qty = Barang::find($barangOut->barang_id)->stocks;
        $qty = $qty + $barangOut->jumlah;
        Barang::find($barangOut->barang_id)->update([
            'stocks' => $qty,
        ]);

        $barangOut->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
