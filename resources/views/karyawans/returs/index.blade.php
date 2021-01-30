@extends('layout.appKaryawan')

@section('title', 'Retur')


@section('content')
    <table class="table table-striped tabel_kinerja">
        
            {{$nomor = 1}}
            @if(count($retur) > 0)
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>id Transaksi</th>
                        <th>Alasan</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($retur as $returs)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$returs->transaksi_id}}</td>
                        <td>{{$returs->alasan}}</td>
                        <td><img src="/storage/retur/{{$returs->foto}}" alt=""></td>
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
                <p>No Returs Found</p>
            @endif
        
    </table>
    
@endsection