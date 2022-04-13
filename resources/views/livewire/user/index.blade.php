@section('title', 'Index User')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
        <div class="card-wrap">
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
            @endif
            <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="card-header bg-primary text-light">Tabel data User</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Role</th>
                        <th>Aksi</th>
                      </tr>
                    
                    @foreach ($user as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                          <a href="{{ route('user.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $user->links() }}
                </div>
              </div>
        </div>
    </div>
</div>


                                


