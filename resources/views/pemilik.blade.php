<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>JulvyLeather :: Home</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    {{-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png"> --}}

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('/images/apple-touch-icon.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
    
    <!-- Custom & Default Styles -->
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="style.css"> --}}

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>
<body>  

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="Apa yang ingin Anda cari?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header">
            <div class="topbar clearfix">
                <div class="container">
                    <nav class="navbar navbar-default yamm">
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="logout.php">Keluar</a></li>                            
                            </ul>
                        </div>
                    </nav><!-- end navbar -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="halaman_pemilik_perusahaan.php"><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="halaman_pemilik_perusahaan.php">Home</a></li>
                            <li><a href="halaman_pemilik_perusahaan.php">Statistik</a></li>
                            <li><a href="tambah_promo.html">Promo</a></li>
                            <li class="iconitem"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a></li>

                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>

        <section id="home" class="video-section js-height-full">
            <div class="overlay"></div>
            <div class="home-text-wrapper relative container">
                <div class="home-message">
                    <p>Hai, Bos!</p>
                    <small>Julvy Leather adalah toko online yang menjual barang-barang yang terbuat dari artificial leather. Semua barang yang kami jual merupakan barang handmade dan terjamin kualitasnya.</small>
                    <div class="btn-wrapper">
                        <div class="text-center">
                            <a href="#about" class="btn btn-primary wow slideInLeft">Laporan</a> &nbsp;&nbsp;&nbsp;<a href="#kategori" class="btn btn-default wow slideInRight">Produk</a>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
        </section>

        <section id="about" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 hidden-sm hidden-xs">
                        <div class="custom-module">
                            <img src="upload/device_01.png" alt="" class="img-responsive wow slideInLeft">
                        </div><!-- end module -->
                    </div><!-- end col -->
                    <div class="col-md-8">
                        <div class="custom-module p40l">
                            <h2>Di web ini, semua karyawan Julvy Leather dapat membuat beberapa laporan.</h2>

                            <p>Adapun laporan yang dapat dibuat di antaranya:</p>

                            <hr class="invis">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 first">
                                    <ul class="check">
                                        <li><a href="laporan_pemasukan.html">Laporan Pemasukan</a></li>
                                        <li><a href="laporan_pengeluaran.html">Laporan Pengeluaran</a></li>
                                        <li><a href="laporan_kinerja.html">Laporan Kinerja Pegawai</a></li>
                                    </ul><!-- end check -->

                            <hr class="invis">

                        </div><!-- end module -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section id="kategori" class="section gb">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Kategori</h3>
                </div><!-- end title -->

                <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
                    {{-- @foreach ($kategori as $ktgr) --}}
                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="upload/course_03.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                        <a href="{{url('/tas')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                <p><a href="{{url('/tas')}}" title="">Tas</a></p>
                                <br>
                                <br>
                                <a href="{{url('/hapus_kategori')}}"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    {{-- <small><a href="{{url('/hapus_kategori')}}">Hapus</a></small> --}}
                                </h4>
                            </div><!-- end details -->
                            <div class="course-footer clearfix">
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    {{-- @endforeach --}}
                </div>


                </div><!-- end row -->
            <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #cccccc; text-align: center;"><a href="{{url('tambah_kategori')}}">Tambah Kategori</a></p>
                <hr class="invis">
        </section>

        <div class="copyrights">
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="cop-logo">
                            <a href="#"><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>

                    <div class="pull-right">
                        <div class="footer-links">
                            <ul class="list-inline">
                                <li>Design : <a href="https://html.design">HTML.Design</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </div><!-- end copy -->
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    {{-- <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="js/videobg.js"></script> --}}

    <script src="{{ asset('js/jquery.min.js') }}" ></script>  
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/carousel.js') }}" ></script>
    <script src="{{ asset('js/animate.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>
    <script src="{{ asset('js/videobg.js') }}" ></script>

</body>
</html>