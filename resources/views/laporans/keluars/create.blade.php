@extends('layout.appKaryawan')
@section('title', 'Laporan Keluar')


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


{!! Form::open(['action' => ['LaporankeluarsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container form">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Laporan pengeluaran</div>
                <div class="panel-body">
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
                            {{Form::label('total', 'Total')}}
                            <br>
                            {{Form::text('total', '', ['class' => 'form-control', 'placeholder' => 'Total pengeluaran'])}}
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