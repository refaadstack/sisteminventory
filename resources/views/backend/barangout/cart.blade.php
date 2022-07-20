@extends('backend.master.master')
@section('title', 'Barang keluar')
@section('content')
<div>
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Barang keluar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barangOut.index') }}">Barang keluar</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
        <div class="card-wrap">
          @if (session()->has('message'))
              <div class="alert alert-danger">
                {{ session('message') }}
              </div>
              
            @endif
          @if(Session::has('success'))
              <script type="text/javascript">
                  function massge() {
                  swal(
                              'Good job!',
                              'Data Berhasil disimpan!',
                              'success'
                          );
                  }
                  window.onload = massge;
              </script>
          @endif
            {{-- <a href="{{ route('barangOut.create') }}" class="btn btn-primary mb-2">Tambah</a> --}}
            <div class="card-header bg-primary text-light">Tabel data Barang keluar</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        {{-- <th>Di input oleh</th> --}}
                        {{-- @if (Auth::user()->role == 'superAdmin')
                        <th>Aksi</th>
                        @endif --}}
                      </tr>
                    
                    @foreach ($carts as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>

                </div>
            </div>

            {{-- //form barang keluar --}}
            <div class="card p-2">

                <div class="card-header bg-primary text-light">Form data Barang keluar</div>
                    
                <div class="card p-2 bg-light">
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nama_pembeli">Nama Pembeli</label>
                                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" placeholder="Nama Pembeli">
                                    
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_keluar">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" placeholder="Tanggal">

                                </div>
                            </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="1">Lunas</option>
                                        <option value="2">Belum Lunas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn-block btn-primary">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
