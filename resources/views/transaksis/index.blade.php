@extends('layout.app')


@section('title', 'Histori Transaksi')

@section('content')

<br><br><br><br><br><br><br><br><br><br>

<div class="container cart">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <h3>Riwayat Transaksi</h3>
                            <a href="/pesanan_status"><button>Status pesanan terbaru</button></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">  
                    <table class="table table-striped">
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Total Transaksi</th>
                            <th>Alamat</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                            @foreach ($transaksis as $transaksi)
                                {{-- <p>{{$transaksi->id}}</p> --}}
                                <tr>
                                    <td>{{$transaksi->id}}</td>
                                    <td>{{$transaksi->total_harga}}</td>
                                    <td>{{$transaksi->alamat}}</td>
                                    <td>{{$transaksi->updated_at}}</td>
                                </tr>
                            @endforeach
                        {{-- @foreach ($produks as $produk)
                        <tr>
                            <td>{{$produk->nama}}</td>
                            <td>{{$produk->harga}} X {{$produk->pivot->quantity}}</td>
                            {{$flag = 0}}
                            @foreach($ulasans as $ulasan)
                                @if($ulasan->id_produk == $produk->id)
                                    {{$flag = 1}}
                                @endif
                            @endforeach
                            @if($flag == 0)
                            <strong>Anda belum mengisi ulasan produk {{$produk->nama}}</strong>
                            <td><a href="produk/{{$produk->id}}"><button>Isi ulasan</button></a></td>
                            @endif
                        </tr>
                        @endforeach --}}
                        {{-- <tr>
                            <td>Total</td>
                            <td>{{$transaksi->total_harga}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$transaksi->alamat}}</td>
                        </tr>
                        @if($transaksi->status == 0)
                        <tr>
                            <td><strong>Silahkan masukkan foto bukti transfer/pembayaran agar pesanan dapat diproses</strong></td>
                            {!! Form::open(['action' => 'CheckoutsController@bayar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <td>{{Form::label('bukti', 'Bukti Pembayaran')}}</td>
                            <td>{{Form::file('foto')}}</td>
                            <td>{{Form::submit('submit', ['class' => 'btn btn-primary'])}}</td>
                            {!! Form::close() !!}
                        </tr>
                        @else
                            <p>Pesanan sedang di proses</p>
                        @endif --}}
                        <hr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection