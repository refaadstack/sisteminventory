@section('title', 'Barang Masuk')
<div>

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Barang Masuk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barangIn.index') }}">Barang Masuk</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
        <div class="card-wrap">
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
            @endif
            <a href="{{ route('barangIn.create') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="card-header bg-primary text-light">Tabel data Barang Masuk</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Supplier</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                        <th>Di input oleh</th>
                        <th>Aksi</th>
                      </tr>
                    
                    @foreach ($barangIn as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->supplier->nama_supplier }}</td>
                        <td>{{ date('j F Y', strtotime($item->tanggal_masuk)) }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->user->role }} - {{ $item->user->name }}</td>
                        <td>
                          <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $barangIn->links() }}
                </div>
              </div>
        </div>
    </div>
</div>

</div>
