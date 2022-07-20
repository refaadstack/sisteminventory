<div class="card p-2">
    <h5>Form Tambah Barang Keluar</h5>
<div>
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-md-6">
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
            </div>
            <div class="col md-6">
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" wire:model="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">tambah</button>
    </form>
</div>
</div>