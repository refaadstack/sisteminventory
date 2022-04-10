@section('title', 'Tambah Supplier')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Supplier</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('supplier.index') }}">Supplier</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah Supplier</a></div>
            </div>
        </div>
        <div class="card-wrap">
            <div>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" wire:model="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" placeholder="Nama Supplier">
                        @error('nama_supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="number" wire:model="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Nomor Telepon">
                        @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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


