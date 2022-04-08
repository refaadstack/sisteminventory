@extends('backend.master.master')
@section('title', 'Edit Barang')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Edit Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('barang.index') }}">Barang</a></div>
                <div class="breadcrumb-item"><a href="#">Ubah barang</a></div>
            </div>
        </div>
        <div class="card-wrap">
            @livewire('barang.edit')
        </div>
    </div>
</div>

@endsection