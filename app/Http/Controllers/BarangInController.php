<?php

namespace App\Http\Controllers;
use App\Models\BarangOut;
use App\Models\BarangIn;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = BarangIn::all();
        return view('backend.barangin.index', compact(['barang']));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangIn = BarangIn::findOrFail($id);
        $qty = Barang::find($barangIn->barang_id)->stocks;
        $qty = $qty - $barangIn->jumlah;
        Barang::find($barangIn->barang_id)->update([
            'stocks' => $qty,
        ]);
        $barangIn->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
