@section('title', 'Edit Status')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Edit Status</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barang.index') }}">Barang</a></div>
                <div class="breadcrumb-item"><a href="#">Ubah barang</a></div>
            </div>
        </div>
        <div class="card-wrap">
            <div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <input type="hidden" wire:model="status" class="form-control">
                        <label for="status">Nama Barang</label>
                        <select name="status" id="" wire:model="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="1">Lunas</option>
                            <option value="0">Belum Dibayar</option>
                            <option value="2">Barang Rusak</option>
                        </select>
                        @error('status')
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

    