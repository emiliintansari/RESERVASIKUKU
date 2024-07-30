@extends('layout.app')

@section('title', 'Data Pesanan Baru')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Pesanan Baru
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
                <tbody>
                    @foreach($bokings as $index => $boking)
                        @if($boking->status === 'Baru')
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $boking->nama }}</td>
                            <td>{{ $boking->nama_catalog }}</td>
                            <td>{{ $boking->jumlah }}</td>
                            <td>{{ $boking->tanggal }}</td>
                            <td>{{ $boking->waktu }}</td>
                            <td>
                                <a href="#" data-id="{{ $boking->id }}" class="btn btn-success btn-aksi">Konfirmasi</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-aksi', function() {
            const id = $(this).data('id');

            $.ajax({
                url: '/pesanan/ubah_status/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: 'Dikonfirmasi'
                },
                success: function(response) {
                    location.reload();
                }
            });
        });
    });
</script>
@endpush
