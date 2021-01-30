@extends('layout.app')


@section('title', 'Pengembalian')

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

{!! Form::open(['action' => ['RetursController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="boxed kotak_form_produk">
        @include('inc.messages')
        <div class="form_box">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('transaksi id', 'Kode Transaksi')}}
                    <br>
                    {{Form::text('transaksi_id', '', ['class' => 'form-control', 'placeholder' => 'Kode transaksi'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('alasan', 'Alasan')}}
                    <br>
                    {{Form::text('alasan', '', ['class' => 'form-control', 'placeholder' => 'Isikan nama produk dan alasan pengembalian'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('Foto', 'Foto')}}
                    <br>
                    {{Form::file('foto')}}
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
        
