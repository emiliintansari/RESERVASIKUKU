@extends('layout.home')

@section('content')

@foreach($catalogs as $catalog)

<div class="col-md-4" style="padding-top: 50px; padding-right: 30px;">
            <div class="card">
              <img src="{{ url('uploads') }}/{{ $catalog->gambar }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $catalog->nama_catalog }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($catalog->harga)}} <br>
                    <hr>
                    <strong>Deskripsi :</strong> <br>
                    {{ $catalog->deskripsi }} 
                </p>
                <a href="{{ url('boking') }}/{{ $catalog->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Boking</a>
              </div>
            </div> 
        </div>

@endforeach

@endsection