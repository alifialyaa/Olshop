
{{-- -000000000000000000000000000000000000000000000000- --}}

@extends('layout.app')


@section('title', 'Layanan Kurir')

@section('content')
<section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Layanan Kurir</h3>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section gb nopadtop">
        <div class="container">
            <div class="boxed">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Pilih Layanan
                            </div>
                            <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <select name="layanan" class="form-control"> --}}
                                            {{-- <option value="">--Layanan--</option> --}}
                                            <div class="row">
                                            @if($cost[0]['costs'] == null)
                                            {
                                                <p>Layanan tidak tersedia. Silakan pilih layanan ekspedisi lain</p>
                                                <a href="/checkout"><button>Ulangi</button></a>
                                            }
                                            @endif
                                            @foreach ($cost[0]['costs'] as $ongkos)
                                            {{-- {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}} --}}
                                        {{-- <a href=""> --}}
                                            {!!Form::open(['action' => ['CheckoutsController@ongkir', $cost[0]['costs'][$loop->index]['cost'][0]['value']], 'method' => 'POST', 'class'=>'pull-right'])!!}
                                            {{Form::hidden('_method', 'POST')}}
                                            <div class="col-md-6">
                                                <button type="submit">
                                                    <p>{{$cost[0]['costs'][$loop->index]['service']}}</p>             
                                                    <p>Ongkos kirim : {{$cost[0]['costs'][$loop->index]['cost'][0]['value']}}</p>
                                                    <p>Estimasi (hari) : {{$cost[0]['costs'][$loop->index]['cost'][0]['etd']}}</p>
                                                </button>
                                            </div>
                                        {{-- </a> --}}
                                            {!!Form::close()!!}
                                                    @endforeach
                                                </div>
                                            </select>
                                        </div>
                                    </div>
                            {{-- <button type="submit" class="btn">Submit</button> --}}
                            </div>
                        </div>

                        {{-- <option value="ongkos">{{$cost[0]['costs'][$loop->index]['service']}}</option>
                                            {{$loop->index}} --}}
                                            
                        
                    

                        

                        

                    </div><!-- end col -->

                    

            </div><!-- end boxed -->
        </div><!-- end container -->
                            {{-- <p style="border: 1px solid rgb(204, 204, 204); padding: 8px; display: block; background-color: #cccccc; text-align: center;"><a href="bayar.html">Bayar</a></p> --}}
    </section>
    

@endsection