@extends('layout.appKaryawan')


@section('title', 'Produk')

@section('content')
        <section class="section cb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tagline-message page-title">
                        <h3>{{$product->nama}}</h3>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-6 text-right">
                        <ul class="breadcrumb">
                            <li><a href="javascript:void(0)">Kategori</a></li>
                        <li class="active">{{$product->nama}}}</li>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section">
            <div class="container">
                <div class=" ">
                    <div class="row">
                        <div class="col-md-6 shop-media">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="image-wrap entry">
                                    <img src="/storage/foto_produk/{{$product->foto1}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a rel="prettyPhoto[inline]" href="/storage/foto_produk/{{$product->foto1}}" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div><!-- end image-wrap -->
                                </div>
                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="image-wrap entry">
                                        <img src="/storage/foto_produk/{{$product->foto2}}" alt="" class="img-responsive">
                                        <div class="magnifier">
                                            <a rel="prettyPhoto[inline]" href="/storage/foto_produk/{{$product->foto2}}" title=""><i class="flaticon-add"></i></a>
                                        </div>
                                    </div><!-- end image-wrap -->
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="image-wrap entry">
                                        <img src="/storage/foto_produk/{{$product->foto3}}" alt="" class="img-responsive">
                                        <div class="magnifier">
                                            <a rel="prettyPhoto[inline]" href="/storage/foto_produk/{{$product->foto3}}" title=""><i class="flaticon-add"></i></a>
                                        </div>
                                    </div><!-- end image-wrap -->
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="image-wrap entry">
                                        <img src="/storage/foto_produk/{{$product->foto1}}" alt="" class="img-responsive">
                                        <div class="magnifier">
                                            <a rel="prettyPhoto[inline]" href="/storage/foto_produk/{{$product->foto1}}" title=""><i class="flaticon-add"></i></a>
                                        </div>
                                    </div><!-- end image-wrap -->
                                </div>
                            </div><!-- end row -->
                        </div><!-- end col -->

                        <div class="col-md-6">
                            <div class="shop-desc">
                                <h3>{{$product->nama}}</h3>
                                <small>Rp {{$product->harga}}</small>
                                <p>{{$product->deskripsiSingkat}}</p>
                                <div class="shop-meta">
                                <a href="/karyawan/produk/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
                                {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class'=>'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!!Form::close()!!}
                                    <ul class="list-inline">
                                    <li> Kode: {{$product->nama}}-{{$product->id}}</li>
                                        <li>Kategori: <a href="/index#kategori">Tas</a>
                                        <li>Sisa: {{$product->stok}}</li>
                                    </ul>
                                </div><!-- end shop meta -->
                            </div><!-- end desc -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis">

                    <div class="row">   
                        <div class="col-md-12">
                            <div class="shop-extra">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Deskripsi</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Informasi Tambahan</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Ulasan (1)</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                    <p>{{$product->deskripsiPanjang}}</p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Informasi Tambahan</h3>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Berat</strong></td>
                                                    <td>{{$product->berat}} gram</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Warna</strong></td>
                                                    <td>{{$product->warna}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Ukuran</strong></td>
                                                    <td>{{$product->ukuran}} cm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <tr>
                                            <td><strong>Alya</strong></td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <td>Tasnya sangat bagus dan awet</td>
                                        </tr>

                                        <hr class="invis">
                                    
                                        <p style="border: 1px solid rgb(204, 204, 204); padding: 15px; display: block; background-color: #cfe2f3; text-align: center;">Anda belum melakukan pembelian.</p>
                                    </div>
                                </div>
                            </div><!-- end shop-extra -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis">

                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>
@endsection