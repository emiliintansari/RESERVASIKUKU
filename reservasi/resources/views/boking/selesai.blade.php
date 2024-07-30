@extends('layout.app')

@section('content')
<!-- resources/views/boking/tampilan.blade.php -->

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Pesanan Selesai
        </h4>
    </div>
    <div class="card-body">
        @if ($bokings->isEmpty())
            <p>Tidak ada pesanan dengan status selesai.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Catalog</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bokings as $index => $boking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $boking->nama }}</td>
                                <td>{{ $boking->nama_catalog }}</td>
                                <td>{{ $boking->jumlah }}</td>
                                <td>{{ $boking->tanggal }}</td>
                                <td>{{ $boking->waktu }}</td>
                                <td>{{ $boking->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
