@extends('layout.app')


@section('title', 'Tambah Produk')

@section('content')

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

{!! Form::open(['action' => ['ProductsController@store', $category], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="boxed kotak_form_produk">
        @include('inc.messages')
        <div class="form_box">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('nama produk', 'Nama Produk')}}
                    <br>
                    {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('deskripsi singkat', 'Deskripsi Singkat')}}
                    <br>
                    {{Form::text('deskripsiSingkat', '', ['class' => 'form-control', 'placeholder' => 'Deskripsi singkat produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('deskripsi panjang', 'Deskripsi Panjang')}}
                    <br>
                    {{Form::text('deskripsiPanjang', '', ['class' => 'form-control', 'placeholder' => 'Deskripsi panjang produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('berat', 'Berat (gram)')}}
                    <br>
                    {{Form::text('berat', '', ['class' => 'form-control', 'placeholder' => 'Berat produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('warna', 'Warna')}}
                    <br>
                    {{Form::text('warna', '', ['class' => 'form-control', 'placeholder' => 'Warna produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('ukuran', 'Ukuran')}}
                    <br>
                    {{Form::text('ukuran', '', ['class' => 'form-control', 'placeholder' => 'Ukuran produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('stok', 'Stok')}}
                    <br>
                    {{Form::text('stok', '', ['class' => 'form-control', 'placeholder' => 'Stok produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('harga', 'Harga')}}
                    <br>
                    {{Form::text('harga', '', ['class' => 'form-control', 'placeholder' => 'Harga produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('kategori', 'Kategori')}}
                    <br>
                    {{Form::text('kategori', $category->nama, ['class' => 'form-control', 'placeholder' => 'Kategori produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('Foto 1', 'Foto 1')}}
                    <br>
                    {{Form::file('foto1')}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('Foto 2', 'Foto 2')}}
                    <br>
                    {{Form::file('foto2')}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('Foto 3', 'Foto 3')}}
                    <br>
                    {{Form::file('foto 3')}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                </div>
            </div>
            
        </div>    
    </div>

{!! Form::close() !!}
@endsection
        
