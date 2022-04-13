@section('title', 'Barang Keluar')
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
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
            @endif
            <a href="{{ route('barangOut.create') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="card-header bg-primary text-light">Tabel data Barang keluar</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal keluar</th>
                        <th>Jumlah</th>
                        {{-- <th>Di input oleh</th> --}}
                        @if (Auth::user()->role == 'superAdmin')
                        <th>Aksi</th>
                        @endif
                      </tr>
                    
                    @foreach ($barangOut as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->nama_pembeli }}</td>
                        <td>{{ date('j F Y', strtotime($item->tanggal_keluar)) }}</td>
                        <td>{{ $item->jumlah }}</td>
                        {{-- <td>{{ $item->user->role }} - {{ $item->user->name }}</td> --}}
                        @if (Auth::user()->role == 'superAdmin')
                        <td>
                          <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $barangOut->links() }}
                </div>
              </div>
        </div>
    </div>
</div>

</div>
