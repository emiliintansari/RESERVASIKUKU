@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Data Tim</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_team">Nama Tim</label>
            <input type="text" class="form-control" id="nama_team" name="nama_team" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Tim</button>
    </form>
    <br>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Lihat Data Tim</a>
</div>
@endsection
