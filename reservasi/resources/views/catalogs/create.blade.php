@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Data Catalog</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('catalogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_team">Tim</label>
            <select class="form-control" id="id_team" name="id_team" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->nama_team }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_catalog">Nama Catalog</label>
            <input type="text" class="form-control" id="nama_catalog" name="nama_catalog" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Catalog</button>
    </form>
    <br>
    <a href="{{ route('catalogs.index') }}" class="btn btn-secondary">Lihat Data Catalog</a>
</div>
@endsection
