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
    <title>JulvyLeather :: Tambah</title>
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
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
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
                                <input class="form-control" type="text" placeholder="What you are looking for?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header header-normal">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <ul class="nav navbar-nav navbar-right">
                                <li><a href="logout.php">Keluar</a></li>                            
                        </ul>
                    </div><!-- end row -->
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

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <h3>Tambah Produk</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">

                                    <div class="blog-desc-big">
                                        <label>Nama Produk</label>
                                        <input type="text" name="productname" class="form_login" placeholder="Nama Produk .." required="required">
 
                                        <label>Deskripsi Singkat</label>
                                        <form class="big-contact-form row" role="search">
                                            <div class="col-md-12">
                                                <textarea class="form-control" placeholder="Deskripsi.."></textarea>
                                            </div>                            
                                        </form>

                                        <label>Deskripsi Panjang</label>
                                        <form class="big-contact-form row" role="search">
                                            <div class="col-md-12">
                                                <textarea class="form-control" placeholder="Deskripsi.."></textarea>
                                            </div>                            
                                        </form>

                                        <label>Berat</label>
                                        <input type="text" name="berat" class="form_login" placeholder="Berat .." required="required">

                                        <label>Warna</label>
                                        <input type="text" name="berat" class="form_login" placeholder="Warna .." required="required">
                                        
                                        <label>Ukuran</label>
                                        <input type="text" name="ukuran" class="form_login" placeholder="Ukuran .." required="required">

                                        <label>Stok</label>
                                        <input type="text" name="stok" class="form_login" placeholder="Stok .." required="required">

                                        <label>Foto Produk</label>
                                        <form>
                                            <input type="file" name="file_gambar1" accept="image/*">
                                            <input type="file" name="file_gambar2" accept="image/*">
                                            <input type="file" name="file_gambar3" accept="image/*">
                                            <input type="file" name="file_gambar4" accept="image/*">
                                        </form>


                                        <hr class="invis">

                                    </div><!-- end desc -->
                                </div><!-- end blog -->
                            </div><!-- end content -->
                            <input type="submit" class="tombol_login" value="Tambah">
                        </div><!-- end col -->   
                        </div><!-- end sidebar -->
                    </div><!-- end row -->

                </div><!-- end boxed -->
            </div><!-- end container -->
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
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script> --}}

    <script src="{{ asset('js/jquery.min.js') }}" ></script>  
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
   
    <script src="{{ asset('js/animate.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>

</body>
</html>