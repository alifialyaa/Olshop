@extends('layout.app')


@section('title', 'Home')

@section('content')
<section id="home" class="video-section js-height-full">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>JulvyLeather.com</p>
            <small>Julvy Leather adalah toko online yang menjual barang-barang yang terbuat dari artificial leather. Semua barang yang kami jual merupakan barang handmade dan terjamin kualitasnya.</small>
            <div class="btn-wrapper">
                <div class="text-center">
                    <a href="#about" class="btn btn-primary wow slideInLeft">Tentang Julvy Leather</a> &nbsp;&nbsp;&nbsp;<a href="#kategori" class="btn btn-default wow slideInRight">Belanja</a>
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
                    <h2>Kami menjual barang-barang yang terbuat dari artificial leather berkualitas, namun tetap terjangkau.</h2>

                    <p>Adapun barang-barang yang kami jual di antaranya:</p>

                    <hr class="invis">

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 first">
                            <ul class="check">
                                <li>Dompet</li>
                                <li>Tas</li>
                                <li>Cardholder</li>
                            </ul><!-- end check -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="check">
                                <li>Ikat Pinggang</li>
                                <li>Gantungan Kunci</li>
                            </ul><!-- end check -->    
                        </div><!-- end col-lg-4 -->
                    </div><!-- end row -->   

                    <hr class="invis">

                    <div class="btn-wrapper">
                        <a href="#kategori" class="btn btn-primary">Lihat Selengkapnya</a>
                    </div>

                </div><!-- end module -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


{{-- @extends('index') --}}



<section class="section gb">
    <div id="kategori" class="container">
        <div class="section-title text-center">
            <h3>Kategori</h3>
        </div><!-- end title -->
        
        @if(count($categories)>4)
            <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            
                {{-- @if(count($categories)==0)
                <p>0</p>
                @elseif(count($categories)==1)
                <p>1</p> --}}
                {{-- @if(count($categories)==2)
                <p>2</p> --}}
                {{-- @if(count($categories)==3)
                <p>3</p> --}}
                {{-- @elseif(count($categories)==4)
                <p>4</p> --}}
                {{-- @endif --}}

                
                    @foreach($categories as $category)
                    {{-- <div class="row"><!-- TAMBAHAN --> --}}
                        {{-- <div class="caro-item"> --}}
                            <div class="course-box">
                                <div class="image-wrap entry">
                                <img src="/storage/foto_kategori/{{$category->foto}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                            <a href="/index/{{$category->id}}" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div><!-- end image-wrap -->
                                <div class="course-details">
                                    <h4>
                                    <a href="/index/{{$category->id}}" title="">{{$category->nama}}</a>
                                    </h4>
                                    
                                    {{-- {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class'=>'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                    {!!Form::close()!!} --}}
                                    
                                {{-- <a href="/index/{{$category->id}}/edit"><button class="btn btn-info btn-sm">Edit</button></a> --}}
                        
                                </div><!-- end details -->
                                <div class="course-footer clearfix">
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        {{-- </div><!-- end col --> --}}
                    {{-- </div> <!-- TAMBAHAN --> --}}
                    @endforeach
                    {{-- {{$categories->links()}} --}}
                </div><!-- end row -->
            @elseif(count($categories)>0)
            <div class="row blog-grid shop-grid">
                @foreach($categories as $category)
                    {{-- <div class="row"><!-- TAMBAHAN --> --}}
                        {{-- <div class="caro-item"> --}}
                        <div class="col-md-3">
                            <div class="course-box shop-wrapper">
                                <div class="image-wrap entry">
                                <img src="/storage/foto_kategori/{{$category->foto}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                            <a href="/index/{{$category->id}}" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div><!-- end image-wrap -->
                                <div class="course-details shop-box">
                                    <h4>
                                    <a href="/index/{{$category->id}}" title="">{{$category->nama}}</a>
                                    </h4>
                                    
                                    {{-- {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class'=>'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                    {!!Form::close()!!} --}}
                                    
                                {{-- <a href="/index/{{$category->id}}/edit"><button class="btn btn-info btn-sm">Edit</button></a> --}}
                        
                                </div><!-- end details -->
                                <div class="course-footer clearfix">
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div>
                        {{-- </div><!-- end col --> --}}
                        {{-- </div> <!-- TAMBAHAN --> --}}
                        @endforeach
                </div>
            @else
            <p>No Categories Found</p>
            @endif
          

            {{-- <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="upload/course_01.jpg" alt="" class="img-responsive">
                        <div class="magnifier">
                                <a href="{{url('tas')}}" title=""><i class="flaticon-add"></i></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="{{url('tas')}}" title="">Tas</a>
                        </h4>
                    </div><!-- end details -->
                    <div class="course-footer clearfix">
                    </div><!-- end footer -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="upload/course_02.jpg" alt="" class="img-responsive">
                        <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Dompet</a>
                    </div><!-- end details -->
                    <div class="course-footer clearfix">
                    </div><!-- end footer -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="upload/course_03.jpg" alt="" class="img-responsive">
                        <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Ikat Pinggang</a>
                        </h4>
                    </div><!-- end details -->
                    <div class="course-footer clearfix">
                    </div><!-- end footer -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="upload/course_04.jpg" alt="" class="img-responsive">
                        <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Cardholder</a>
                        </h4>
                    </div><!-- end details -->
                    <div class="course-footer clearfix">
                    </div><!-- end footer -->
                </div><!-- end box -->
            </div><!-- end col -->

            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img src="upload/course_01.jpg" alt="" class="img-responsive">
                        <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div class="course-details">
                        <h4>
                            <a href="#" title="">Gantungan Kunci</a>
                        </h4>
                    </div><!-- end details -->
                    <div class="course-footer clearfix">
                    </div><!-- end footer -->
                </div><!-- end box -->
            </div><!-- end col --> --}}
        </div><!-- end row -->
        {{-- <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #cccccc; text-align: center;"><a href="/index/create">Tambah Kategori</a></p> --}}
        <hr class="invis">
</section>
@endsection