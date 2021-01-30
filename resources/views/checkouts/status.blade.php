@extends('layout.app')


@section('title', 'Detil Transaksi')

@section('content')

<div class="container">
    <div>
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>
        @endif
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

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
                            <th>Produk</th>
                        </tr>
                        @foreach ($produks as $produk)
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
                            {{-- <td><a href="{{Route('ulasan')}}"><button>Isi ulasan</button></a></td> --}}
                            @endif
                        </tr>
                        {{-- @if()
                        <tr>
                            <td><strong>Anda Belum mengisi ulasan {{$produk->nama}}</strong></td>
                            <td><button>Ulasan</button></td>
                        </tr> --}}
                        @endforeach
                        <tr>
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
                        @endif
                        <hr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection