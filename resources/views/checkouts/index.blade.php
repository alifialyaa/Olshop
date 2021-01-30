@extends('layout.app')


@section('title', 'Alamat & Kurir')

@section('content')
<section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Alamat & Kurir</h3>
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
                        <div class="card">
                            <div class="card-header">
                                Alamat
                            </div>
                            <div class="card-body alamat">
                            <form class="form-horizontal" role="form" action="{{route('checkouts.ongkir')}}" method="POST">
                                    {{-- {{crsf_field()}} --}}
                                    {{ csrf_field() }}
                                    <div class="form-group-sm">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Provinsi Asal</label>
                                                <select name="province_origin" class="form-control">
                                                <option value="">--Sumatera Utara--</option>
                                                {{-- @foreach ($provinces as $province => $value)
                                                <option value="{{$province}}">{{$value}}</option>
                                                @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Kota Asal</label>
                                                <select name="city_origin" class="form-control">
                                                <option value="">--Medan--</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provinsi Tujuan</label>
                                            <select name="province_destination" class="form-control">
                                            <option value="">--Provinsi--</option>
                                            @foreach ($provinces as $province => $value)
                                            <option value="{{$province}}">{{$value}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kota Tujuan</label>
                                            <select name="city_destination" class="form-control">
                                            <option value="">--Kota--</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="alamat" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kurir</label>
                                            <select name="courier" class="form-control">
                                                @foreach ($couriers as $courier => $value)
                                                <option value="{{$courier}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Berat (gram)</label>
                                        <input type="number" name="weight" id="" class="form-control" value="{{$berat}}" readonly="readonly">
                                        {{-- <select name="weight" class="form-control"> --}}
                                            {{-- <option value="">{{$berat}}</option>  --}}
                                        </div>
                                    </div>
                                    <div class="apa">

                                    </div>
                                    <div class="col-md-6">

                                        <button type="submit" class="btn">Submit</button>
                                    </div>
                                
                                    {{-- @foreach ($provinces as $province => $value) --}}
                                        {{-- <option value="{{$province}}">{{$value}}</option> --}}
                                        {{-- {{$provinces}} --}}
                                    {{-- @endforeach --}}
                                </div>
                                </form>
                            </div>
                        </div>
                        
                        {{-- <div class="content blog-list">
                            <div class="blog-wrapper clearfix">

                                <div class="blog-desc-big">
                                    <label>provinsi</label>
                                    <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #ffffff; text-align: center;">Jalan Raya Balerejo no. 111, Madiun, Jawa Timur</p>

                                    <label>kota/kabupaten</label>
                                    <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #ffffff; text-align: center;">Jalan Raya Balerejo no. 111, Madiun, Jawa Timur</p>

                                    <label>kelurahan/desa</label>
                                    <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #ffffff; text-align: center;">Jalan Raya Balerejo no. 111, Madiun, Jawa Timur</p>
                                    
                                    <label>Alamat</label>
                                    <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #ffffff; text-align: center;">Jalan Raya Balerejo no. 111, Madiun, Jawa Timur</p>

                                    <label>Kode Pos</label>
                                    <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #ffffff; text-align: center;">JNE</p>

                                    <hr class="invis">

                                </div><!-- end desc -->
                            </div><!-- end blog -->
                        </div><!-- end content --> --}}

                        

                        

                    </div><!-- end col -->

                    {{-- <div class="sidebar col-md-4">
                        <div class="row blog-grid shop-grid">

                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_01.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="tas_auto_A.html" title="">Tas Auto A</a>
                                    <small>Tas</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li>Jumlah = 1</li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">Rp 100000</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                        <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #cccccc; text-align: center;"><a href="batal_beli.html">Batal</a></p>
                    </br>
                        


                        
                    </div><!-- end sidebar -->
                </div><!-- end row --> --}}

            </div><!-- end boxed -->
        </div><!-- end container -->
                            {{-- <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #cccccc; text-align: center;"><a href="bayar.html">Bayar</a></p> --}}
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script>
        $(document).ready(function(){
            // $('select[name="province_origin"]').on('change', function(){
            //     let provinceId = $(this).val();
            //     if(provinceId){
            //         jQuery.ajax({
            //             url: '/province/'+provinceId+'/cities',
            //             type:"GET",
            //             dataType:"json",
            //             success:function(data){
            //                 $('select[name="city_origin"]').empty();
            //                 $.each(data, function(key, value){
            //                     $('select[name="city_origin"]').append('<option value="'+ key +'">'+ value + '</option>');
            //                 });
            //             },
            //         });
            //     }else{
            //         $('select[name="city_origin"]').empty();
            //     }
            // });

            $('select[name="province_destination"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId){
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="city_destination"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="city_destination"]').append('<option value="'+ key +'">'+ value + '</option>');
                            });
                        },
                    });
                }else{
                    $('select[name="city_destiantion"]').empty();
                }
            });

        });
    </script>

@endsection


{{-- $('select[name="city_origin"]').on('change', function(){
    let provinceId = $(this).val();
    if(provinceId){
        jQuery.ajax({
            url: '/province/'+provinceId+'/cities',
            type:"GET",
            dataType:"json",
            success:function(data){
                $('select[name="city_destination"]').empty();
                $.each(data,function(key, value){
                    $('select[name="city_destination"]').append('<option value="'+key+'">')
                })
            }
        })
    }
}) --}}