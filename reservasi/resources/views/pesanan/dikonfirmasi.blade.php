@extends('layout.app')

@section('title', 'Data Pesanan Dikonfirmasi')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Pesanan Dikonfirmasi
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Catalog</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection