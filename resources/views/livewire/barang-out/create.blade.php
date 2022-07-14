@section('title' ,'Tambah Transaksi Keluar')
    
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Barang Keluar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barangIn.index') }}">Barang Keluar</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>

        <div class="card-wrap">
            @if (session()->has('message'))
              <div class="alert alert-danger">
                {{ session('message') }}
              </div>
              
            @endif
            <div>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="barang_id">Nama Barang</label>
                        <select wire:model="barang_id" class="form-control @error('barang_id') is-invalid @enderror" aria-label="Default select example">
                            <option value="{{ old('barang_id') }}">=== pilih barang ===</option>
                            @foreach ($barangs as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                          </select>
                        @error('barang_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">Nama Pembeli</label>
                        <input type="text" wire:model="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror" value="{{ old('nama_pembeli') }}">
                        @error('pelanggan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_keluar">Tanggal Keluar</label>
                        <input type="date" wire:model="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar" placeholder="Pilih Tanggal" value="{{ old('tanggal_keluar') }}">
                        @error('tanggal_keluar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" wire:model="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select wire:model="status" class="form-control @error('status') is-invalid @enderror" aria-label="Default select example" value="{{ old('status') }}">
                            <option value="">=== pilih status ===</option>
                            <option value="1">Lunas</option>
                            <option value="0">Transaksi Belum Selesai</option>
                          </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">tambah</button>
            </div>
        </div>
    </div>
</div>
