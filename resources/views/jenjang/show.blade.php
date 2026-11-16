
@extends('adminlte::page')

@section('title', 'Detail Jenjang')

@section('content_header')
    <h1>Detail Jenjang</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Nama Jenjang:</strong> {{ $jenjang->nama_jenjang }}</p>
        <p><strong>Keterangan:</strong> {{ $jenjang->keterangan }}</p>

        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@stop
