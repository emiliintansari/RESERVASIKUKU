@extends('layout.app')

@section('content')

<div class="container mt-5">
    <h2>Data Tim</h2>
    <br>
<a href="{{ route('teams.create') }}" class="btn btn-secondary">Tambah Data tim</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tim</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $team->nama_team }}</td>
                <td>{{ $team->deskripsi }}</td>
                <td>
                    @if($team->gambar)
                        <img src="{{ asset('uploads/' . $team->gambar) }}" alt="{{ $team->nama_team }}" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus tim ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
