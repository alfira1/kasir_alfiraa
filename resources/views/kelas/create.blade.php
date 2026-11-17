
@extends('adminlte::page')

@section('title', 'Tambah Kelas')

@section('content_header')
    <h1>Tambah Kelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text"
                        name="nama_kelas"
                        class="form-control @error('nama_jenjang') is-invalid @enderror"
                        id="nama_kelas"
                        required
                        placeholder="Contoh: XII RPL 1"
                        value="{{ old('nama_kelas') }}">

                    @error('nama_kelas')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
    <label for="jenjang_id">Jenjang</label>

    <select name="jenjang_id"
        id="jenjang_id"
        class="form-control @error('jenjang_id') is-invalid @enderror"
        required>

        <option value="">-- Pilih Jenjang --</option>

        @foreach ($jenjangs as $jenjang)
            <option value="{{ $jenjang->id }}"
                {{ old('jenjang_id') == $jenjang->id ? 'selected' : '' }}>
                {{ $jenjang->nama_jenjang }}
            </option>
        @endforeach
    </select>

    @error('jenjang_id')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

            <div class="form-group">
            <label for="jurusan_id">Jurusan</label>

            <select name="jurusan_id"
                id="jurusan_id"
                class="form-control @error('jurusan_id') is-invalid @enderror"
                required>

                <option value="">-- Pilih Jurusan --</option>

                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}"
                        {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama_jurusan }}
                    </option>
                @endforeach
            </select>

            @error('jurusan_id')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

                    <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Nonaktif</option>
                    </select>
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
