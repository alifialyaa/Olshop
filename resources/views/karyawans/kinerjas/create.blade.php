@extends('layout.appKaryawan')


@section('title', 'Kinerja Harian')

@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Buat Kinerja Harian</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

{!! Form::open(['action' => ['KinerjasController@store', $id_karyawan], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container form">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Kinerja Harian</div>
                <div class="panel-body">
                    <div class="form-group">
                        {{-- {{$id_karyawan}} --}}
                        {{-- {{Form::label('deskripsi', 'Deskripsi')}} --}}
                        {{-- <br> --}}
                        {{-- <div class="col-md-6"> --}}
                            {{Form::textarea('deskripsi', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Deskripsi kinerja'])}}
                        {{-- </div> --}}
                        <br>
                    </div>
                    <div class="col-md-offset-10">
                        <div class="form-group">
                            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="boxed kotak_form_produk">
        @include('inc.messages')
        <div class="form_box">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('deskripsi', 'Deskripsi')}}
                    <br>
                    {{Form::text('deskripsi', '', ['class' => 'form-control', 'placeholder' => 'Deskripsi kinerja'])}}
                    <br>
                </div>
            </div>
    </div> --}}

{!! Form::close() !!}
@endsection