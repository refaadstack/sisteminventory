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
              @livewire('barang-out.create')
        <div class="card-wrap">

          @if (session()->has('message'))
              <div class="alert alert-danger">
                {{ session('message') }}
              </div>
              
            @endif
          @if(Session::has('success'))
              <script type="text/javascript">
                  function massge() {
                  swal(
                              'Good job!',
                              'Data Berhasil disimpan!',
                              'success'
                          );
                  }
                  window.onload = massge;
              </script>
          @endif
            {{-- <a href="{{ route('barangOut.create') }}" class="btn btn-primary mb-2">Tambah</a> --}}
            <div class="card-header bg-primary text-light">Tabel data Barang keluar</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        {{-- <th>Di input oleh</th> --}}
                        {{-- @if (Auth::user()->role == 'superAdmin')
                        <th>Aksi</th>
                        @endif --}}
                      </tr>
                    
                    @foreach ($carts as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->quantity }}</td>
                        {{-- <td>{{ $item->nama_pembeli }}</td> --}}
                        {{-- <td>{{ date('j F Y', strtotime($item->tanggal_keluar)) }}</td> --}}
                        {{-- <td>{{ $item->jumlah }}</td>
                        <td>@if ($item->status =="0")
                            <span class="badge badge-warning">Belum lunas</span>
                            @elseif ($item->status =="2")
                            <span class="badge badge-danger">Barang Rusak</span>
                            @else
                            <span class="badge badge-success">Lunas</span>
                        @endif</td>
                        <td><a href="{{ route('export.notaKeluar',$item->id) }}" class="btn btn-light">Print Nota</a></td>
                        <td>
                          <a href="{{ route('barangOut.edit',$item->id) }}" class="btn btn-sm btn-warning mb-2">Edit</a>
                          @if (Auth::user()->role == 'superAdmin')

                          <form method="POST" action="{{ route('barangOut.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                        </td>
                        @endif --}}
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="{{ route('cart.index') }}" class="btn btn-sm btn-success">Selesaikan pembayaran</a>

                {{ $carts->links() }}
                </div>
              </div>
        </div>
    </div>
</div>

</div>
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
   $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Kamu yakin mau hapus data ini?`,
              text: "data yang berkaitan dengan data ini juga akan hilang loh",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      }); 
</script>
  
@endpush
