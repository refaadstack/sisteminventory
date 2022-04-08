@extends('backend.master.master')
@section('title', 'Barang')
@section('barang', 'active')
@section('content')

<livewire:barang.index>

@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    
@endsection
@endsection