<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\Courier;
use App\Transaksi;
use App\Ulasan;
use App\Laporanmasuk;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Promo;
use DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('checkouts.index');
        $couriers = Courier::pluck('nama', 'code');
        $provinces = Province::pluck('title', 'province_id');
        
        $berat = 0;
        $id_pembeli = auth()->user()->id;
        // $transaksi = DB::table('transaksis')->where('id_pembeli', $id_pembeli)->first();
        // $transaksi = Transaksi::find($id_pembeli);
        // $produks = $transaksi->products;
        // foreach($produks as $product){
        //     $berat += $product->berat;
        // }
        // $transaksi = Transaksi::find()->where('id_pembeli', $id_pembeli);
        // $transaksi = Transaksi::find(7);
        $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
        // dd($transaksi);
        $produks = $transaksi->products;
        // public function products(){

            
        // $trans = Transaksi::findOrFail($transaksi->id);
        // $jumlahBarangs = $trans->products;

        foreach($produks as $product){
            $berat = ($berat + $product->berat) * $product->pivot->quantity;
            $product->stok -= $product->pivot->quantity;
            $product->save();

            // dd('masuk');
            // dd($product);
        }
        // dd('masuk');
        // dd($berat);

        // foreach ($transaksi as $products){
        //     dd($products->product_id);
        // }
            
        // dd($transaksi->products);
        // dd($misal);
        
        
        return view('checkouts.index', compact('couriers', 'provinces'))->with('berat', $berat);
        // dd($provinces);
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }
    // public function getOngkir($id)
    // {
    //     $ongkos = $cost[0]['costs'][$id]['cost'][0]['value'];
    //     return json_encode($ongkos);
    // }
    // public function getEstimasi($id)
    // {
    //     $hari = $cost[0]['costs'][$id]['cost'][0]['etd'];
    //     return json_encode($hari);
    // }
    public function submit(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        =>278,
            'destination'   =>$request->city_destination,
            'weight'        =>$request->weight,
            'courier'       =>$request->courier
        ])->get();

        // dd($request->city_origin);

        // 278 kota

        // dd($cost);
        // dd($cost[0]['code']);
        // dd($cost[0]['costs'][0]);
        // dd($cost[0]['costs'][0]['cost'][0]['value']);

        // $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;

        
        $kota = City::where('city_id', $request->city_destination)->pluck('title');
        $provinsi = Province::where('province_id', $request->province_destination)->pluck('title');
        $alamat = $request->alamat.', '.$kota[0].', '.$provinsi[0];
        $code = City::where('city_id', $request->city_destination)->pluck('postal_code');

        // dd($code[0]);
        
        // dd($code);

        $id_pembeli = auth()->user()->id;
        $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
        // $transaksi = DB::table('transaksis')->where('id_pembeli', $id_pembeli)->get();
        // $transaksi = new Transaksi;
        // $transaksi->id_pembeli = auth()->user()->id;
        $harga=0;
        $produks = $transaksi->products;
        foreach($produks as $product){
            $harga += $product->harga * $product->pivot->quantity;
            // dd('masuk');
            // dd($product);
        }
        $transaksi->alamat = $alamat;
        $transaksi->kode_pos = $code[0];
        $transaksi->status = 0;
        $transaksi->total_harga = $harga;
        $transaksi->kurir = $cost[0]['code'];
        $transaksi->save();

        // dd($transaksi->alamat);

        return view('checkouts.ongkir')->with('cost', $cost);
    }

    public function ongkir($ongkos)
    {
        $id_pembeli = auth()->user()->id;
        $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
        $produks = $transaksi->products;
        // $transaksi = DB::table('transaksis')->where('id_pembeli', $id_pembeli)->get();
        // $transaksi = new Transaksi;
        // $transaksi->id_pembeli = auth()->user()->id;
        // $harga=0;
        // $produks = $transaksi->products;
        // foreach($produks as $product){
        //     $harga += $product->harga;
        //     // dd('masuk');
        //     // dd($product);
        // }
        // $potongan = $promo->value
        // if()

        $harga=0;
        $produks = $transaksi->products;
        foreach($produks as $product){
            $harga = $harga + ($product->harga * $product->pivot->quantity);
            // dd('masuk');
            // dd($product);
        }

        $promo = Promo::where('id', $transaksi->id_promo)->first();
        // dd($promo);
        // $total = $transaksi->total_harga + $ongkos;
        
        if($promo == null)
        {
            $potongan = 0;
        }   
        else
        {
            $potongan = $harga * $promo->value/100;
        }
        
        // $total = $totalFix * (100-$promo->value)/100;
        $total = $harga - $potongan + $ongkos;
        $transaksi->total_harga = $total;
        $transaksi->ongkir = $ongkos;
        $transaksi->save();

        return view('checkouts.transaksi')->with('transaksi', $transaksi)->with('produks', $produks)->with('potongan', $potongan)->with('ongkos', $ongkos);

        // dd($ongkos);
    }

    public function bayar(Request $request)
    {
        $this->validate($request,[
            'foto' => 'image|nullable|max:1999'
        ]);

        // handle file upload
        if($request->hasFile('foto')){
            // get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('foto')->storeAs('public/foto_bukti', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $id_pembeli = auth()->user()->id;
        $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
        $produks = $transaksi->products;
        $transaksi->bukti_tf = $fileNameToStore;
        $transaksi->status = 1;
        

        // $laporanmasuk = Laporanmasuk::where('created_at', DB::raw(DATE($transaksi->updated_at)))->get();
        // $laporanmasuk = Laporanmasuk::where(format('created_at'), DB::raw(DATE($transaksi->updated_at)))->get();
        // $laporanmasuk = Laporanmasuk::where(DB::raw(DATE('created_at')), DB::raw(DATE($transaksi->updated_at)))->get();
        $tanggal = $transaksi->updated_at->format('Y/m/d');
        // $laporanmasuk = Laporanmasuk::where(DB::raw('DATE(`created_at`)'), DB::select(DB::raw("SELECT updated_at FROM transaksis WHERE")) )->get();
        $laporanmasuk = Laporanmasuk::where(DB::raw('DATE(`created_at`)'), $tanggal )->first();
        // $customerhistory = Customerhistory::where('customer_id', '=', '1')
        //     ->select('freetext', DB::raw('DATE(`created_at`)'))
        //     ->get();
        // $t = Laporanmasuk::where(DB::raw(DATE('created_at')), DB::raw(DATE($transaksi->updated_at)))->get();
        // $laporanmasuk = Laporanmasuk::where('created_at', DB::raw(DATE("SELECT updated_at ")'))->first();
        // dd($laporanmasuk->id);
        if($laporanmasuk == null)
        {
            $laporanmasuk = new Laporanmasuk;
            $laporanmasuk->total = $transaksi->total_harga;
            $laporanmasuk->save();
        }
        else
        {
            // dd($transaksi->updated_at);
            // dd($laporanmasuk->total);
            $laporanmasuk->total += $transaksi->total_harga;   
            $laporanmasuk->save();
            // $laporanmasuk->total = $total;
        }

        $transaksi->id_laporan = $laporanmasuk->id;
        $transaksi->save();

        Cart::destroy();


        // // Create category
        // $category = new Category;
        // $category->nama = $request->input('nama');
        // $category->foto = $fileNameToStore;
        // $category->save();

        // ini muncul disini masihan

        $ulasans = Ulasan::where('id_transaksi', $transaksi->id)->get();

        // return back()->with('success_message', 'Item has been removed');
        return view('checkouts.status')->with('transaksi', $transaksi)->with('produks', $produks)->with('ulasans', $ulasans);
        

        // return redirect('/pemilik/create_category')->with('success', 'Category Created');
    }

    public function tampil()
    {   
        $id_pembeli = auth()->user()->id;
        $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
        $produks = $transaksi->products;
            
            
    
    
            // // Create category
            // $category = new Category;
            // $category->nama = $request->input('nama');
            // $category->foto = $fileNameToStore;
            // $category->save();
    
            // ini muncul disini masihan
    
            $ulasans = Ulasan::where('id_transaksi', $transaksi->id)->get();

        

        // return back()->with('success_message', 'Item has been removed');
        return view('checkouts.status')->with('transaksi', $transaksi)->with('produks', $produks)->with('ulasans', $ulasans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
