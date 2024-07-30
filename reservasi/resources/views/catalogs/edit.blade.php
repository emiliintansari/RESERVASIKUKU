@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Data Catalog</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('catalogs.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_team">Tim</label>
            <select class="form-control" id="id_team" name="id_team" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $catalog->id_team == $team->id ? 'selected' : '' }}>
                        {{ $team->nama_team }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_catalog">Nama Catalog</label>
            <input type="text" class="form-control" id="nama_catalog" name="nama_catalog" value="{{ $catalog->nama_catalog }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $catalog->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $catalog->harga }}" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            @if($catalog->gambar)
                <img src="{{ asset('uploads/' . $catalog->gambar) }}" alt="{{ $catalog->nama_catalog }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Catalog</button>
    </form>
    <br>
    <a href="{{ route('catalogs.index') }}" class="btn btn-secondary">Kembali ke Daftar Catalog</a>
</div>
@endsection
