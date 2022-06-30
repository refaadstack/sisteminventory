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
                          <form method="POST" action="{{ route('user.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
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

