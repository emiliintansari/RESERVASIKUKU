@extends('layout.home')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Pemesanan Produk</h2>
            <form action="{{ route('boking.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="invoice">Invoice:</label>
                    <input type="text" name="invoice" class="form-control" id="invoice" required>
                </div>
                <div class="form-group">
                    <label for="grand_total">Grand Total:</label>
                    <input type="text" name="grand_total" class="form-control" id="grand_total" required>
                </div>
                <div class="form-group">
                    <label for="id_catalog">ID Catalog:</label>
                    <input type="text" name="id_catalog" class="form-control" id="id_catalog" required>
                </div>
                <div class="form-group">
                    <label for="id_team">ID Team:</label>
                    <input type="text" name="id_team" class="form-control" id="id_team" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="text" name="jumlah" class="form-control" id="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="total">Total:</label>
                    <input type="text" name="total" class="form-control" id="total" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>-->

<div class="container">
    <h1>Tambah Pesanan</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('boking.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_catalog">Pilih Produk</label>
            <select name="id_catalog" id="id_catalog" class="form-control" required>
                <option value="">Pilih Produk</option>
                @foreach($catalogs as $catalog)
                    <option value="{{ $catalog->id }}">{{ $catalog->nama_catalog }} ({{ $catalog->team->nama_team }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
</div>

@endsection
