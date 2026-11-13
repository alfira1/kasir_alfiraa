@extends('adminlte::page')

@section('title', 'Detail Jurusan')

@section('content_header')
    <h1>Detail Jurusan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Kode Jurusan:</strong> {{ $jurusan->kode_jurusan }}</p>
        <p><strong>Nama Jurusan:</strong> {{ $jurusan->nama_jurusan }}</p>
        <p><strong>Keterangan:</strong> {{ $jurusan->keterangan }}</p>
        <p><strong>Status:</strong> {{ $jurusan->status }}</p>

        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@stop
