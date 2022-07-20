@extends('backend.master.master')
@section('title', 'Penjualan')
@section('barang', 'active')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Penjualan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Penjualan</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Keluar</th>
                        <th>Total Pembayaran</th>
                        <th>status</th>
                        @if (Auth::user()->role == 'superAdmin')
                        <th>Aksi</th>
                        @endif
                      </tr>
                    
                    @foreach ($penjualan as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pembeli }}</td>
                        <td>{{ date('j F Y', strtotime($item->tanggal_keluar)) }}</td>
                        <td>Rp. {{ number_format($item->total) }}</td>
                        <td>
                            @if ($item->status == '0')
                            <span class="badge badge-danger">Belum Lunas</span>
                                
                            @else
                            <span class="badge badge-success">Lunas</span>
                            @endif
                        </td>
                        @if (Auth::user()->role == 'superAdmin')
                        <td>
                            <a class="btn btn-sm btn-warning mb-2" href="{{ route('export.notaKeluar',$item->id) }}">nota</a>
                          <form method="POST" action="{{ route('barangIn.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{ $penjualan->links() }} --}}
                </div>
              </div>
        </div>
    </div>
</div>
@endsection