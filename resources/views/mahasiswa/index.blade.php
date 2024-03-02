@extends('layouts.main')
@section('title', 'Data Mahasiswa')
@section('content')

@if(session()->has('berhasil'))
    <div class="alert alert-success">
        {{session()->get('berhasil') }}
    </div>
@endif
        <div class ="container mt-s">
            <div class="card">
                <div class="card-header">
                    <h3>Data Mahasiswa</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">Tambah</a>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Fakultas</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $increment = 1;
                            @endphp
                            @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{ $increment++ }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi }}</td>
                                <td>{{ $item->fakultas }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus data ini?')" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>     
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection