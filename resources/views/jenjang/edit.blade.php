
@extends('adminlte::page')

@section('title', 'Edit Jenjang')

@section('content_header')
    <h1>Edit Jenjang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_jenjang">Nama Jenjang</label>
                    <input type="text"
                        name="nama_jenjang"
                        class="form-control @error('nama_jenjang') is-invalid @enderror"
                        id="nama_jenjang"
                        value="{{ old('nama_jenjang', $jenjang->nama_jenjang) }}"
                        placeholder="Contoh: X, XI, XII"
                        required>

                    @error('nama_jenjang')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        id="keterangan"
                        rows="3"
                        placeholder="Contoh: Kelas 10">{{ old('keterangan', $jenjang->keterangan) }}</textarea>

                    @error('keterangan')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

                <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
@stop
