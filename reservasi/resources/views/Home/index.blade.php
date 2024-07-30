@extends('layout.home')
@section('content')
 <!-- Hero Slider -->
 <section class="hero-wrap relative">
        <div>
          <div class="full-screen-hero">
            <div class="container" id="fs-container">
              <div class="hero-holder">
                <div class="hero-message style-2 dark">
                  <div class="hero-text-holder">
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
  </section> <!-- end hero slider -->


  <!-- Promo Banners -->
<section class="section-wrap promo-banners pb-30">
    <div class="container">
        <div class="row">

            @foreach ($teams as $team)
            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner">
                <a href="#">
                    <img src="/uploads/{{$team->gambar}}" alt="">
                    <div class="overlay"></div>
                    <div class="promo-inner valign">
                        <h2>{{$team->nama_team}}</h2>
                        <span>{{$team->deskripsi}}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section> <!-- end promo banners -->

<!-- Trendy Products -->
<section class="section-wrap-sm new-arrivals pb-50">
    <div class="container">

        <div class="row heading-row">
            <div class="col-md-12 text-center">
                <span class="subheading">Hot items of this year</span>
                <h2 class="heading bottom-line">
                    trendy products
                </h2>
            </div>
        </div>

        <div class="row items-grid">
            @foreach ($catalogs as $catalog)
            <div class="col-md-3 col-xs-6">
                <div class="product-item hover-trigger">
                    <div class="product-img">
                        <a href="/shop-single.html">
                            <img src="/uploads/{{$catalog->gambar}}" alt="">
                        </a>
                        <div class="hover-overlay">
                            <div class="product-actions">
                                <a href="#" class="product-add-to-wishlist">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                            <div class="product-details valign">
                                <span class="category">
                                    <a
                                        href="/catalogs/{{$catalog->id_team}}">{{$catalog->team->nama_team}}</a>
                                </span>
                                <h3 class="product-title">
                                    <a href="/catalog/{{$catalog->id}}">{{$catalog->nama_barang}}</a>
                                </h3>
                                <span class="price">
                                    <ins>
                                        <span class="amount">Rp. {{number_format($catalog->harga)}}</span>
                                    </ins>
                                </span>
                                <div class="btn-quickview">
                                    <a href="/boking/{{$catalog->id}}" class="btn btn-md btn-color">
                                        <span>More</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> <!-- end row -->
    </div>
</section> <!-- end trendy products -->
@endsection