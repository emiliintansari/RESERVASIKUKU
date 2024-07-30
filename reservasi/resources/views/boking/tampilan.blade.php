@extends('layout.app')

@section('content')
<!-- resources/views/boking/tampilan.blade.php -->

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Pesanan Baru
        </h4>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

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
                        <th>Aksi</th>
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
                        <td>
                            
                            <form action="{{ route('boking.updateStatus', $boking->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Set Selesai</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
