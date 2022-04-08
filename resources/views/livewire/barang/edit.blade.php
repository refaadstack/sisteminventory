@section('title', 'Edit Barang')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Edit Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barang.index') }}">Barang</a></div>
                <div class="breadcrumb-item"><a href="#">Ubah barang</a></div>
            </div>
        </div>
        <div class="card-wrap">
            <div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <input type="hidden" wire:model="barang_id">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" wire:model="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Nama Barang">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" wire:model="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" >
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stocks">Stocks</label>
                        <input type="number" wire:model="stocks" class="form-control @error('stocks') is-invalid @enderror" id="stocks" placeholder="Stocks">
                        @error('stocks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat(Kg)</label>
                        <input type="number" wire:model="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Berat">
                        @error('berat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" wire:model="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" placeholder="Gambar">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- @if ($gambar)
                            Photo Preview:
                            <img src="{{ $gambar->temporaryUrl() }}">
                        @endif --}}
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi" id="deskripsi" rows="3"></textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

    