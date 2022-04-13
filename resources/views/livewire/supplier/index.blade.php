@section('title', 'Index Supplier')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Supplier</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Supplier</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
        <div class="card-wrap">
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
            @endif
            <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="card-header bg-primary text-light">Tabel data Supplier</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama supplier</th>
                        <th>Alamat</th>
                        <th>No telepon</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      </tr>
                    
                    @foreach ($suppliers as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_supplier }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                          <a href="{{ route('supplier.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          @if (Auth::user()->role == 'superAdmin')
                          <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                          @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $suppliers->links() }}
                </div>
              </div>
        </div>
    </div>
</div>


                                

