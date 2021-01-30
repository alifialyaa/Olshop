@extends('layout.appPemilik')
{{$nomor = 1}}
@section('title', 'Kinerja')


@section('content')
    <table class="table table-striped tabel_kinerja">
        <br><br><br><br><br><br><br>
        <a href="{{url('/pemilik/promo/buat_promo')}}">
            <button>
                Create Promo
            </button>
        </a>
        
            
            @if(count($promo) > 0)
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Kode Promo</th>
                        <th>Nama Promo</th>
                        <th>Deskripsi</th>
                        <th>Potongan Harga</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal berakhir</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($promo as $promos)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$promos->kode}}</td>
                        <td>{{$promos->nama}}</td>
                        <td>{{$promos->deskripsi}}</td>
                        <td>{{$promos->value}}%</td>
                        <td>{{$promos->tanggal_mulai}}</td>
                        <td>{{$promos->tanggal_selesai}}</td>
                    </tr>
                @endforeach
            </tbody>
            @else
                <br>
                <br>
                <br>
                <br>
                <p>No Promo Found</p>
            @endif
        
    </table>
    
@endsection