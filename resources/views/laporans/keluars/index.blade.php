@extends('layout.appPemilik')

@section('title', 'Laporan Pengeluaran')


@section('content')
{!! Form::open(['action' => ['KinerjasController@filter'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <br><br><br><br><br><br><br>
                    <div class="col-md-8 col-md-offset-2">
                            {{Form::label('nama', 'Nama')}}
                            <br>
                            {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama Karyawan'])}}
                        <br>
                    </div>
                    <div class="col-md-2 col-md-offset-2">
                        {{-- <div class="form-group"> --}}
                            {{Form::label('tanggal mulai', 'Tanggal Mulai')}}
                            <br>
                            {{-- <input type="date" name="bday"> --}}
                            {{Form::date('tanggal_mulai', '', ['class' => 'form-control', 'placeholder' => 'Tanggal mulai'])}}
                            <br>
                        {{-- </div> --}}
                    </div>
                    <div class="col-md-2 col-md-offset-2">
                        {{-- <div class="form-group"> --}}
                            {{Form::label('tanggal selesai', 'Tanggal Selesai')}}
                            <br>
                            {{-- <input type="date" name="bday"> --}}
                            {{Form::date('tanggal_selesai', '', ['class' => 'form-control', 'placeholder' => 'Tanggal selesai'])}}
                            <br>
                        {{-- </div> --}}
                    </div>
                    <div class="col-md-offset-10">
                        <div class="form-group">
                            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>
{!! Form::close() !!}
    <table class="table table-striped tabel_kinerja">
        
            {{$nomor = 1}}
            @if(count($laporans) > 0)
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>id Karyawan</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($laporans as $laporan)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$laporan->karyawan_id}}</td>
                        <td>{{$laporan->deskripsi}}</td>
                        <td>{{$laporan->total}}</td>
                        <td>{{$laporan->created_at}}</td>
                    </tr>
                    {{-- <div class="well">
                        {!!$kinerja->deskripsi!!}
                    </div>
                    <hr>
                <small>Written on {{$kinerja->created_at}}</small> --}}
                @endforeach
            </tbody>
            @else
                <br>
                <br>
                <br>
                <br>
                <p>No Laporans Found</p>
            @endif
        
    </table>
    
@endsection