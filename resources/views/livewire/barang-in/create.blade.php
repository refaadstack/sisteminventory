@section('title', 'Tambah Barang Masuk')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Barang Masuk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barangIn.index') }}">Barang Masuk</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah barang</a></div>
            </div>
        </div>
        <div class="card-wrap">
            <div>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="barang_id">Nama Barang</label>
                        <select wire:model="barang_id" class="form-control @error('barang_id') is-invalid @enderror" aria-label="Default select example">
                            <option value="">=== pilih barang ===</option>
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
                        <label for="supplier_id">Nama Supplier</label>
                        <select wire:model="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" aria-label="Default select example">
                            <option value="">=== pilih supplier ===</option>
                            @foreach ($suppliers as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                            @endforeach
                          </select>
                        @error('supplier_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" wire:model="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" placeholder="Pilih Tanggal">
                        @error('tanggal_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" wire:model="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah">
                        @error('jumlah')
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


