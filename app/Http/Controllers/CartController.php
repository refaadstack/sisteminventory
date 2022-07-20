<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangOut;
use App\Models\Penjualan;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('backend.barangout.cart', ['carts' => $cart]);
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
        $data = $request->all();
         
        $cart = Cart::with('barang')->where('user_id', auth()->user()->id)->get();
        $data['nama_pembeli'] = $request->nama_pembeli;
        $data['status'] = $request->status;
        $data['tanggal_keluar'] = $request->tanggal_keluar;
        $data['hitung'] = 0;
        $data['jumlah'] = 0;
        $data['total'] = 0;
        foreach ($cart as $c) {
            $data['hitung'] = $c->quantity * $c->barang->harga;
            $data['jumlah'] = $data['jumlah'] + $c->quantity;
            $data['total'] = $data['total'] + $data['hitung'];
        }
        

        $barangOut = BarangOut::create($data);

        //create penjualan
        foreach ($cart as $c) {
            $items[]= Penjualan::create([
                'barang_id' => $c->barang_id,
                'barangOut_id' => $barangOut->id,
                'user_id' => auth()->user()->id,
            ]);
            $barang = Barang::find($c->barang_id);
            $barang->stocks = $barang->stocks - $c->quantity;
            $barang->save();
        } 



        $cart = Cart::where('user_id', auth()->user()->id)->delete();



        session()->flash('message', 'Pembayaran diterima');
        return redirect()->route('barangOut.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
