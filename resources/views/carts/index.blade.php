@extends('layout.app')


@section('title', 'Keranjang')
{{$i=0}}

@section('content')
<br>
<br><br><br><br><br><br>
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
@if (Cart::count()>0)
<h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
<div class="container cart">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
								</button>
							</div>
						</div>
					</div>
                </div>
				<div class="panel-body">
                    @foreach(Cart::content() as $item)
                        <div class="row">
                            <a href="{{route('produk.show', $item->model->id)}}"><div class="col-xs-2"><img class="img-responsive" src="/storage/foto_produk/{{$item->model->foto1}}"></a>
                            </div>
                            <div class="col-xs-4">
                            <a href="{{route('produk.show', $item->model->id)}}"><h4 class="product-name"><strong>{{$item->model->nama}}</strong></h4></a><h4><small>{{$item->model->deskripsiSingkat}}</small></h4></a>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-6 text-right">
                                    <h6><strong>Rp. {{$item->model->harga}} <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-xs-4">
									{{-- {{$produks->pivot}} --}}
									{{-- <h6><strong>{{$produks->skip($i++)->first()->pivot->quantity}}</strong></h6> --}}
									{{-- <h6><strong>{{$produks->get()->pivot->quantity}}</strong></h6> --}}
									@foreach ($jumlahBarangs as $jumlahBarang)
								{{-- <h6><strong>{{$jumlahBarang->id}}</strong></h6> --}}
									@if($jumlahBarang->id == $item->model->id)
										<h6><strong>{{$jumlahBarang->pivot->quantity}}</strong></h6>
									@endif

									@endforeach
									{{-- <input type="number" name="jumlahProduk" min="1" max={{$product->stok}} value=1> --}}
                                    {{-- <input type="text" class="form-control input-sm" value="1"> --}}
								</div>
								{{-- {{$item}} --}}
                                <div class="col-xs-2">
                                    {!!Form::open(['action' => ['CartsController@destroy', $item->rowId, $item->model->id], 'method' => 'POST', 'class'=>'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                    {!!Form::close()!!}
                                    {{-- <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
					{{-- <div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="1">
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
					<hr> --}}
					{{-- <div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="1">
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
					<hr> --}}
					{{-- <div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Added items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Update cart
								</button>
							</div>
						</div>
					</div> --}}
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
						<h4 class="text-right">Sub Total <strong>Rp. {{Cart::total()}}</strong></h4>
						@if ($total != null)
						{{-- <p>masuk</p> --}}
						<h4 class="text-right">Total* <strong>Rp. {{$total}}</strong></h4>
						
						<form action="{{route('carts.hapusDiskon')}}" method="POST">
							{{ csrf_field() }}
							<button type="submit" class="button button-plain">Hapus Kupon</button>
						</form>

						@endif
						</div>
						<div class="col-xs-3">
						<form action="{{route('carts.tambahDiskon')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="kode" id="coupon_code">
							<input type="hidden" name="tanggalPromo" value="{{ date('Y-m-d') }}">
							
							<button type="submit" class="button button-plain">Gunakan Kupon</button>
						</form>
                            {{-- <a href="{{route('carts.tambahDiskon')}}">
                                <button type="button" class="btn btn-success btn-block">
                                    Gunakan Kupon
                                </button>
                            </a> --}}
						</div>
						<div class="col-xs-3">
                            <a href="{{route('checkouts.index')}}">
                                <button type="button" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                            </a>
						</div>
					</div>
                </div>
                @else
                    <h3>No Items in Cart!</h3>
                @endif
			</div>
		</div>
	</div>
</div>
@endsection