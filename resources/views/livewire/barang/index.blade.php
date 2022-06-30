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
            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="card-header bg-primary text-light">Tabel data Barang</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-light table-bordered" id="#barang">
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
                          <form method="POST" action="{{ route('barang.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
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
