@section('title', 'Tambah Barang')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barang.index') }}">Barang</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah barang</a></div>
            </div>
        </div>
        <div class="card-wrap">
            <div>
                <form wire:submit.prevent="store">
                    <div class="form-group">
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
                        <input type="number" wire:model="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select wire:model="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">
                            <option value="">Pilih Kategori</option>
                            <option value="Mainan Kayu Edukasi">Mainan Kayu Edukasi</option>
                            <option value="Aneka Balok">Aneka Balok</option>
                            <option value="Balok Miniatur">Balok Miniatur</option>
                            <option value="Maket dan Peraga">Maket dan Peraga</option>
                            <option value="Mainan Berdiri & Peraga">Mainan Berdiri & Peraga</option>
                            <option value="Chungki dan Puzzle">Chungki dan Puzzle</option>
                            <option value="Puzzle">Puzzle</option>
                            <option value="Stempel">Stempel</option>
                            <option value="Spons Edukasi">Spons Edukasi</option>
                            <option value="Permainan Sensori">Permainan Sensori</option>
                            <option value="Permainan Sensori Montessori">Permainan Sensori Montessori</option>
                            <option value="Alat Musik Tradisional">Alat Musik Tradisional</option>
                            <option value="Permainan Tradisional">Permainan Tradisional</option>
                            <option value="Sentra Bermain Peran">Sentra Bermain Peran</option>
                            <option value="Aneka Baju Adat">Aneka Baju Adat</option>
                            <option value="Aneka Baju Profesi">Aneka Baju Profesi</option>
                            <option value="Media Pembelajaran & Perlengkapan Kelas">Media Pembelajaran & Perlengkapan Kelas</option>
                            <option value="Pikler dan Brakiasi">Pikler dan Brakiasi</option>
                            <option value="Buku PAUD">Buku PAUD</option>
                            <option value="Buku Cerita dan Mewarnai">Buku Cerita dan Mewarnai</option>
                        </select>
                        @error('kategori')
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

