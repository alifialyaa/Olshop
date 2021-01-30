@extends('layout.appKaryawan')

@section('title', 'Kinerja')


@section('content')
    <table class="table table-striped tabel_kinerja">
        
            {{$nomor = 1}}
            @if(count($kinerjas) > 0)
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($kinerjas as $kinerja)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$kinerja->created_at}}</td>
                        <td>{!!$kinerja->deskripsi!!}</td>
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
                <p>No Kinerja Found</p>
            @endif
        
    </table>
    
@endsection