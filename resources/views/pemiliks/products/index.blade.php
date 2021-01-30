@extends('layout.appPemilik')

@section('title', 'Produk')

@section('content')

        <section class="section lb p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            {{-- <h3>{{$category->nama}}</h3> --}}
                        <h3>{{$categories->nama}}</h3>
                            <ul class="breadcrumb">
                                <li>Kategori</li>
                                {{-- <li class="active">{{$category->nama}}</li> --}}
                            <li class="active">{{$categories->nama}}</li>
                            </ul>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="shop-top">
                        <div class="clearfix">
                            <div class="pull-left">
                                <p> Menampilkan 3 dari 3 produk</p>
                            </div>
                            <div class="pull-right">
                            <select class="selectpicker">
                                <option>Harga - tertinggi ke terendah</option>
                                <option>Harga - terendah ke tertinggi</option>
                                <option>Produk Terbaru</option>
                                <option>Produk Lama</option>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="row blog-grid shop-grid">
                        @if(count($products)>0)
                            @foreach($products as $product)
                                <div class="col-md-3">
                                    <div class="course-box shop-wrapper">
                                        <div class="image-wrap entry">
                                        <img src="/storage/foto_produk/{{$product->foto1}}" alt="" class="img-responsive">
                                            <div class="magnifier">
                                                <a href="/pemilik/produk/{{$product->id}}" title=""><i class="flaticon-add"></i></a>
                                            </div>
                                        </div>
                                        <!-- end image-wrap -->
                                        <div class="course-details shop-box text-center">
                                            <h4>
                                            <a href="/pemilik/produk/{{$product->id}}" title="">{{$product->nama}}</a>
                                                <small>{{$categories->nama}}</small>
                                            </h4>
                                        </div>
                                        <!-- end details -->
                                        <div class="course-footer clearfix">
                                            <div class="pull-left">
                                                <ul class="list-inline">
                                                    <li><a href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a></li>
                                                </ul>
                                            </div><!-- end left -->
        
                                            <div class="pull-right">
                                                <ul class="list-inline">
                                                <li><a href="#">Rp {{$product->harga}}</a></li>
                                                </ul>
                                            </div><!-- end left -->
                                        </div><!-- end footer -->
                                    </div><!-- end box -->
                                </div><!-- end col -->
                            @endforeach
                        @else
                            <p>No Products Found</p>
                        @endif
                        {{-- <div class="col-md-3">
                            <div class="course-box shop-wrapper">
                                <div class="image-wrap entry">
                                <img src="{{asset('upload/shop_01.jpg')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="tas_auto_A_pemilik.html" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div>
                                <!-- end image-wrap -->
                                <div class="course-details shop-box text-center">
                                    <h4>
                                        <a href="tas_auto_A_pemilik.html" title="">Tas Auto A</a>
                                        <small>Tas</small>
                                    </h4>
                                </div>
                                <!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a></li>
                                        </ul>
                                    </div><!-- end left -->

                                    <div class="pull-right">
                                        <ul class="list-inline">
                                            <li><a href="#">Rp 100000</a></li>
                                        </ul>
                                    </div><!-- end left -->
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->

                        <div class="col-md-3">
                            <div class="course-box shop-wrapper">
                                <div class="image-wrap entry">
                                    <img src="{{asset('upload/shop_02.jpg')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="tas_anti_ngulang.html" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div>
                                <!-- end image-wrap -->
                                <div class="course-details shop-box text-center">
                                    <h4>
                                        <a href="tas_anti_ngulang.html" title="">Tas Anti Ngulang</a>
                                        <small>Tas</small>
                                    </h4>
                                </div>
                                <!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a></li>
                                        </ul>
                                    </div><!-- end left -->

                                    <div class="pull-right">
                                        <ul class="list-inline">
                                            <li><a href="#">Rp 100000</a></li>
                                        </ul>
                                    </div><!-- end left -->
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->

                        <div class="col-md-3">
                            <div class="course-box shop-wrapper">
                                <div class="image-wrap entry">
                                    <img src="{{asset('upload/shop_03.jpg')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div>
                                <!-- end image-wrap -->
                                <div class="course-details shop-box text-center">
                                    <h4>
                                        <a href="shop-single.html" title="">Tas Alhamdulillah Lulus</a>
                                        <small>Tas</small>
                                    </h4>
                                </div>
                                <!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a></li>
                                        </ul>
                                    </div><!-- end left -->

                                    <div class="pull-right">
                                        <ul class="list-inline">
                                            <li><a href="#">Rp 75000</a></li>
                                        </ul>
                                    </div><!-- end left -->
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col --> --}}

                    </div><!-- end row -->

                    <hr class="invis">

                    <div class="row text-center">
                    <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #cccccc; text-align: center;"><a href="/pemilik/{{$categories->id}}/create_product">Tambah Produk</a></p>
                        <div class="col-md-12">
                            <ul class="pagination">
                                <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">&raquo;</a></li>
                            </ul>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
            </div><!-- end container -->
        </section>
        @endsection