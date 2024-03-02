@extends('layouts.main')
@section('title', 'Tambah Mahasiswa')
@section('content')
    <div class="container mt-5">
        <div class="card-header">
            <h3>Tambah Mahasiswa</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="@error('nim') is invalid @enderror form-control" value="{{ old('nim') }}" required>
                    
                    @error('nim')
                        <div class="mt-1">
                            <span clas="text-dager">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" class="form-control" value="{{ old('prodi') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : ''}}> Laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : ''}}> Perempuan</option>
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection