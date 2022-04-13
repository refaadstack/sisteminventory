@section('title', 'Index Barang')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Barang</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
        <div class="card-wrap">
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
            @endif
            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="card-header bg-primary text-light">Tabel data Barang</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Stock</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      </tr>
                    
                    @foreach ($barang as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->berat }}</td>
                        <td>{{ $item->stocks }}</td>
                        <td class="py-2 text-center"><img src="{{ Storage::url($item->gambar)}}" alt="{{ $item->nama_barang }}" width="150"></td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                          <a href="{{ route('barang.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                          @if (Auth::user()->role == 'superAdmin')
                          <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                          @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $barang->links() }}
                </div>
              </div>
        </div>
    </div>
</div>
