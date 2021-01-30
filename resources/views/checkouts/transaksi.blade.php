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
                            <h3>Detil Transaksi</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">  
                    <table class="table table-striped">
                        <tr>
                            <th>Produk</th>
                        </tr>
                        {{-- @if($jumlahBarang->id == $item->model->id)
										<h6><strong>{{$jumlahBarang->pivot->quantity}}</strong></h6>
									@endif --}}
                        @foreach ($produks as $produk)
                        <tr>
                            <td>{{$produk->nama}}</td>
                            <td>{{$produk->harga}} X {{$produk->pivot->quantity}}</td>
                            {{-- @if($produk->pivot->quantity) --}}
                            {{-- <td></td> --}}
                        </tr>
                        @endforeach
                        <tr>
                            <td>Ongkos Kirim</td>
                            <td>{{$ongkos}}</td>
                        </tr>
                        <tr>
                            <td>Potongan harga</td>
                            <td>{{$potongan}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{$transaksi->total_harga}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$transaksi->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Kode Transaksi</td>
                            <td>{{$transaksi->id}}</td>
                        </tr>
                        @if($transaksi->status == null)
                        <tr>
                            <td><strong>Silahkan masukkan foto bukti transfer/pembayaran agar pesanan dapat diproses</strong></td>
                            {!! Form::open(['action' => 'CheckoutsController@bayar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <td>{{Form::label('bukti', 'Bukti Pembayaran')}}</td>
                            <td>{{Form::file('foto')}}</td>
                            <td>{{Form::submit('submit', ['class' => 'btn btn-primary'])}}</td>
                            {!! Form::close() !!}
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection