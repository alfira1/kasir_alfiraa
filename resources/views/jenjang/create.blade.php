
@extends('adminlte::page')

@section('title', 'Tambah Jenjang')

@section('content_header')
    <h1>Tambah Jenjang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jenjang.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_jenjang">Nama Jenjang</label>
                    <input type="text"
                        name="nama_jenjang"
                        class="form-control @error('nama_jenjang') is-invalid @enderror"
                        id="nama_jenjang"
                        required
                        placeholder="Contoh: TK, SD, SMP, SMA, SMK"
                        value="{{ old('nama_jenjang') }}">

                    @error('nama_jenjang')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan"
                        id="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        rows="3"
                        placeholder="Contoh: Taman Kanak-Kanak">{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
@stop
