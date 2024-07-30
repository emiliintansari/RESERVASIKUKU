@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Data Catalog</h2>
    <br>
<a href="{{ route('catalogs.create') }}" class="btn btn-secondary">+ Tambah Data Baru</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tim</th>
                <th>Nama Catalog</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogs as $catalog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $catalog->team->nama_team }}</td>
                <td>{{ $catalog->nama_catalog }}</td>
                <td>{{ $catalog->deskripsi }}</td>
                <td>{{ $catalog->harga }}</td>
                <td>
                    @if($catalog->gambar)
                        <img src="{{ asset('uploads/' . $catalog->gambar) }}" alt="{{ $catalog->nama_catalog }}" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ route('catalogs.edit', $catalog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('catalogs.destroy', $catalog->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus catalog ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
