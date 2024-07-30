@extends('layout.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $catalogs->nama_catalog }}</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('uploads') }}/{{ $catalogs->gambar }}" class="rounded mx-auto d-block" width="100%" alt=""> 
                        </div>
                        <div class="col-md-6 mt-5">
                        <form action="{{ route('boking.pesan', $catalogs->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="catalog_nama" value="{{ $catalogs->id }}">
                        <input type="hidden" name="status" value="Baru">
                            <h2 name="catalog_nama">{{ $catalogs->nama_catalog }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($catalogs->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $catalogs->deskripsi }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:</td>
                                        <td>
                                        <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" required>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>:</td>
                                    <td>
                                    <input type="time" name="waktu" class="form-control" placeholder="Waktu" required>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                                
                                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                                        <button type="submit" class="btn btn-primary">Pesan</button>
                                            </form>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
