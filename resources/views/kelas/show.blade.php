@extends('adminlte::page')

@section('title', 'Detail Kelas')

@section('content_header')
    <h1>Detail Kelas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Nama_kelas:</strong> {{ $kelas->nama_kelas }}</p>
        <p><strong>Jenjang_id:</strong> {{ $kelas->jenjang_id }}</p>
        <p><strong>Jurusan_id:</strong> {{ $kelas->jurusan_id }}</p>
        <p><strong>Status:</strong> {{ $kelas->status }}</p>

        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@stop
