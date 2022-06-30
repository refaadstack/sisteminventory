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
                        @if (Auth::user()->role == 'superAdmin')
                        <th>Aksi</th>
                        @endif
                      </tr>
                    
                    @foreach ($barangIn as $item)
                    <tr class="mt-1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->supplier->nama_supplier }}</td>
                        <td>{{ date('j F Y', strtotime($item->tanggal_masuk)) }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->user->role }} - {{ $item->user->name }}</td>
                        @if (Auth::user()->role == 'superAdmin')
                        <td>
                          <form method="POST" action="{{ route('barangIn.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                        </td>
                        @endif
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