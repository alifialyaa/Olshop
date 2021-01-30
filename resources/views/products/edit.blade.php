@extends('layout.app')


@section('title', 'Edit Produk')

@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Edit Produk</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

{!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST']) !!}
    <div class="boxed kotak_form_produk">
        @include('inc.messages')
        <div class="form_box">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('nama produk', 'Nama Produk')}}
                    <br>
                    {{Form::text('nama', $product->nama, ['class' => 'form-control', 'placeholder' => 'Nama produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('deskripsi singkat', 'Deskripsi Singkat')}}
                    <br>
                    {{Form::text('deskripsiSingkat', $product->deskripsiSingkat, ['class' => 'form-control', 'placeholder' => 'Deskripsi singkat produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('deskripsi panjang', 'Deskripsi Panjang')}}
                    <br>
                    {{Form::text('deskripsiPanjang', $product->deskripsiPanjang, ['class' => 'form-control', 'placeholder' => 'Deskripsi panjang produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('berat', 'Berat (gram)')}}
                    <br>
                    {{Form::text('berat', $product->berat, ['class' => 'form-control', 'placeholder' => 'Berat produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('warna', 'Warna')}}
                    <br>
                    {{Form::text('warna', $product->warna, ['class' => 'form-control', 'placeholder' => 'Warna produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('ukuran', 'Ukuran')}}
                    <br>
                    {{Form::text('ukuran', $product->ukuran, ['class' => 'form-control', 'placeholder' => 'Ukuran produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('stok', 'Stok')}}
                    <br>
                    {{Form::text('stok', $product->stok, ['class' => 'form-control', 'placeholder' => 'Stok produk'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('harga', 'Harga')}}
                    <br>
                    {{Form::text('harga', $product->harga, ['class' => 'form-control', 'placeholder' => 'Harga produk'])}}
                    <br>
                </div>
            </div>
            
            {{Form::hidden('_method', 'PUT')}}
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                </div>
            </div>
            
        </div>    
    </div>

{!! Form::close() !!}

@endsection
        
