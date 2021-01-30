@extends('layout.appPemilik')


@section('title', 'Tambah Kategori')

@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Tambah Kategori</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

{!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="boxed kotak_form">
        @include('inc.messages')
        <div class="form_box">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('nama kategori', 'Nama Kategori')}}
                    <br>
                    {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama kategori'])}}
                    <br>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{Form::label('Foto', 'Foto')}}
                    <br>
                    {{Form::file('foto')}}
                    <br><br><br>
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
        
