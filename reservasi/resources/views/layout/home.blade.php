<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/sliders.css" />
  <link rel="stylesheet" href="css/style.css" />

</head>

<body class="relative">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
      <div></div>
    </div>
  </div>

  <main class="main-wrapper">

    <header class="nav-type-1">
      <!-- Fullscreen search -->
      <div class="search-wrap">
        <div class="search-inner">
          <div class="search-cell">
            <form method="get">
              <div class="search-field-holder">
                <input type="search" class="form-control main-search-input" placeholder="Search for">
                <i class="ui-close search-close" id="search-close"></i>
              </div>            
            </form>
          </div>
        </div>        
      </div> <!-- end fullscreen search -->
      
      <nav class="navbar navbar-static-top">
        <div class="navigation" id="sticky-nav">
          <div class="container relative">

            <div class="row flex-parent">

              <div class="navbar-header flex-child">
                <!-- Logo -->
                <div class="logo-container">
                  <div class="logo-wrap">
                    <a href="#">
                      <!--<img class="logo-dark" src="img/lolo.png" alt="logo">-->
                      <h1>MANIMUSE</h1>
                    </a>
                  </div>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Mobile cart -->
                
              </div> <!-- end navbar-header -->

              <div class="nav-wrap flex-child">
                <div class="collapse navbar-collapse text-center" id="navbar-collapse">
                  
                  <ul class="nav navbar-nav">

                    <li class="dropdown">
                      <a href="/">Home</a>
                    </li>

                    @php
                     $teams = App\Models\Team::all();
                    @endphp
                    
                    <li class="dropdown">
                      <a href="/pemesanan">Shop</a>
                      <!--ini untuk menu dropdown nya ambil dari database
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                            <ul class="dropdown-menu megamenu-wide">
                        <li>
                      <div class="megamenu-wrap container">
                      <div class="row">
                          @foreach ($teams as $team)
                          <div class="col-md-3 megamenu-item">
                              <ul class="menu-list">
                                <li>
                                    <span>{{$team->nama_team}}</span>
                                </li>
                                @php
                                $Catalogs =
                                App\Models\Catalog::where('id_team',
                                $team->id)->get();
                                @endphp
                                @foreach ($Catalogs as $catalog)
                                <li>
                                    <a
                                        href="/catalog/{{$catalog->id}}">{{$catalog->nama_catalog}}</a>
                                </li>
                                @endforeach
                              </ul>
                          </div>
                          @endforeach
                        </div>
                        </div>
                        </li>
                    </ul>
                    </li>

                    <li class="mobile-links hidden-lg hidden-md">
                      <a href="#">My Account</a>
                    </li>-->
                  
                    <!-- Mobile search -->
                    <li id="mobile-search" class="hidden-lg hidden-md">
                      <form method="get" class="mobile-search">
                        <input type="search" class="form-control" placeholder="Search...">
                        <button type="submit" class="search-button">
                          <i class="fa fa-search"></i>
                        </button>
                      </form>
                    </li>

                  </ul> <!-- end menu -->
                </div> <!-- end collapse -->
              </div> <!-- end col -->

              
          
            </div> <!-- end row -->
          </div> <!-- end container -->
        </div> <!-- end navigation -->
      </nav> <!-- end navbar -->
    </header>

    <div class="content-wrapper oh">

      <!-- Hero Slider -->
    @yield('content')


    <div class="bottom-footer">
          <div class="container">
            <div class="row">

              <div class="col-sm-6 copyright sm-text-center">
                <span>
                  &copy; 2024 Manimouse
                </span>
              </div>

              <div class="col-sm-6 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
                <i class="fa fa-cc-paypal"></i>
                <i class="fa fa-cc-visa"></i>
                <i class="fa fa-cc-mastercard"></i>
                <i class="fa fa-cc-discover"></i>
                <i class="fa fa-cc-amex"></i>
              </div>

            </div>
          </div>
        </div> <!-- end bottom footer -->
      </footer> <!-- end footer -->
      <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
      </div>

    </div> <!-- end content wrapper -->
  </main> <!-- end main wrapper -->

  <!-- jQuery Scripts -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/plugins.js"></script>  
  <script type="text/javascript" src="js/scripts.js"></script>
    
</body>
</html>