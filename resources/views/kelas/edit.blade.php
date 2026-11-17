@extends('adminlte::page')

@section('title', 'Edit Kelas')

@section('content_header')
    <h1>Edit Kelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
                </div>

                <div class="form-group">
                    <label for="jenjang_id">Jenjang_id</label>
                    <input type="text" name="jenjang_id" class="form-control" id="jenjang_id" value="{{ $kelas->jenjang_id }}" required>
                </div>

                 <div class="form-group">
                    <label for="jurusan_id">Jurusan_id</label>
                    <input type="text" name="jurusan_id" class="form-control" id="jurusan_id" value="{{ $kelas->jurusan_id }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="aktif" {{ $kelas->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ $kelas->status == 'non-aktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop
