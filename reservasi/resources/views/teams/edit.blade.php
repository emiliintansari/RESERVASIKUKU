@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Data Tim</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_team">Nama Tim</label>
            <input type="text" class="form-control" id="nama_team" name="nama_team" value="{{ $team->nama_team }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $team->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            @if($team->gambar)
                <img src="{{ asset('uploads/' . $team->gambar) }}" alt="{{ $team->nama_team }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Tim</button>
    </form>
    <br>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Kembali ke Daftar Tim</a>
</div>
@endsection
