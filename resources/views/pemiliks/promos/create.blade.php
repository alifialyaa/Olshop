@extends('layout.appPemilik')
@section('title', 'Kinerja')


@section('content')

<br><br><br><br><br><br>

<!-- datepicker source: https://github.com/uxsolutions/bootstrap-datepicker -->
<!-- tutorial: https://formden.com/blog/date-picker -->

<div class="container">
       
{{--     $table->string('kode');
            $table->string('nama');
            $table->string('deskripsi');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai'); --}}


{{-- <form action="/action_page.php">
  Birthday:
  <input type="date" name="bday">
  <input type="submit">
</form> --}}


{!! Form::open(['action' => ['PromosController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container form">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Promo</div>
                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {{Form::label('kode', 'Kode')}}
                            <br>
                            {{Form::text('kode', '', ['class' => 'form-control', 'placeholder' => 'Kode promo'])}}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {{Form::label('nama', 'Nama')}}
                            <br>
                            {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama promo'])}}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {{Form::label('value', 'Diskon')}}
                            <br>
                            {{Form::text('value', '', ['class' => 'form-control', 'placeholder' => 'Diskon promo (dalam persentse)'])}}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {{Form::label('deskripsi', 'Deskripsi')}}
                            <br>
                            {{Form::text('deskripsi', '', ['class' => 'form-control', 'placeholder' => 'Deskripsi promo'])}}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {{Form::label('tanggal mulai', 'Tanggal Mulai')}}
                            <br>
                            {{-- <input type="date" name="bday"> --}}
                            {{Form::date('tanggal_mulai', '', ['class' => 'form-control', 'placeholder' => 'Nama promo'])}}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {{Form::label('tanggal selesai', 'Tanggal Selesai')}}
                            <br>
                            {{-- <input type="date" name="bday"> --}}
                            {{Form::date('tanggal_selesai', '', ['class' => 'form-control', 'placeholder' => 'Nama promo'])}}
                            <br>
                        </div>
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

      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="{{ asset('js/jquery.min.js') }}" ></script>  

    <script>
     $('.input-group.date').datepicker({format: "dd.mm.yyyy"});
    </script> --}}

    @endsection