@extends('layout.appKaryawan')


@section('title', 'Transaksi')

@section('content')

<br>

<div class="container cart">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <h3>Riwayat Transaksi</h3>
                            
                        </div>
                    </div>
                </div>
                <div class="panel-body">  
                    <table class="table table-striped">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>ID Pembeli</th>
                            <th>ID Laporan</th>
                            <th>ID return</th>
                            <th>ID promo</th>
                            <th>Total Transaksi</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Bukti Transfer</th>
                            <th>Ongkos Kirim</th>
                            <th>Kurir</th>
                            <th>Resi</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                            @foreach ($transaksis as $transaksi)
                                {{-- <p>{{$transaksi->id}}</p> --}}
                                <tr>
                                    <td>{{$transaksi->id}}</td>
                                    <td>{{$transaksi->id_pembeli}}</td>
                                    <td>{{$transaksi->id_laporan}}</td>
                                    <td>{{$transaksi->id_retur}}</td>
                                    <td>{{$transaksi->id_promo}}</td>
                                    <td>{{$transaksi->total_harga}}</td>
                                    <td>{{$transaksi->alamat}}</td>
                                    <td>{{$transaksi->kode_pos}}</td>
                                    {{-- <td>{{$transaksi->bukti_tf}}</td> --}}
                                    <td><img src="/storage/foto_bukti/{{$transaksi->bukti_tf}}" alt="" class="img-responsive"></td>
                                    <td>{{$transaksi->ongkir}}</td>
                                    <td>{{$transaksi->kurir}}</td>
                                    <td>{{$transaksi->resi}}</td>
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