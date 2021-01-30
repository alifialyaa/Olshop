<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carts;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Promo;
use App\Transaksi;
use Auth;
use DB;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $carts = DB::table('carts')->where('id_pembeli', $id)->get();
        // $products = Product::All();

        $pengguna = auth()->user()->id;
        $keranjang = Carts::All();
        $transaksi = Transaksi::where(['id_pembeli' => $pengguna, 'status' => null])->orderBy('updated_at', 'desc')->first();
        // dd($transaksi);

        $trans = Transaksi::findOrFail($transaksi->id);
        // $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
        // dd($transaksi);
        // $produks = $transaksi->products;

    //     foreach($users as $user):
    //         foreach($user->platforms as $p):
    
    //          if($p->pivot->platform_id == 1) echo $p->pivot->some_value;
    
    //         endforeach;
    // endforeach;

    // $a = Product::with('transaksi')->where('transaksi_id', $transaksi->id)->first(); 
    // foreach($a->transaksis as $user) 
    // { 
    //     // 
    //     echo "pivot value: $user->pivot->quantity"; 
    // }

    // $platform = Platform::with('user')->where('platform_id', 1)->first(); 
    // foreach($platform->users as $user) 
    // { 
    //     echo "username: $user->username , pivot value: $user->pivot->some_value"; 
    // }

        // $model->problems()->where('phone_problem', $problem->id)->first()->pivot->price

        // $a = $transaksi->products()->where('transaksi_id', $transaksi->id)->get()->pivot->quantity;
        // $a = $transaksi->products()->where('transaksi_id', $transaksi->id)->get()->pivot->quantity;

        // $a = $trans->products->skip(1)->first();

        // mendekati kebenaran
        // foreach($trans->products as $a)
        // {
        //     $a->pivot->quantity;
        // }

        $jumlahBarangs = $trans->products;


        // dd($a->pivot->quantity);

        if($transaksi!=null)
        {
            $promo = DB::table('promos')->where('id', $transaksi->id_promo)->first();
        }
        else
        {
            // dd('masuk');
            $promo =null;
        }
        
        if($promo!=null)
        {
            // $total  = Cart::total()*$promo->value/100;
            $total  = Cart::total();
            $total = str_replace(',', '', $total);
            $total = str_replace('.', '', $total);
            $total = $total*(100-$promo->value)/10000;
            // dd($total);
        }
        else
        {
            $total = null;
        }
        // dd($transaksi->id_promo);
        // return view('carts.index')->with('carts', $carts)->with('products', $products);
        // dd($produks->first()->pivot->quantity);
        return view('carts.index')->with('total', $total)->with('jumlahBarangs', $jumlahBarangs);
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

    public function simpan()
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
        $pengguna = auth()->user()->id;
        // dd($pengguna);
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('carts.index')->with('success_message', 'Item already in ypur cart');
        }
        Cart::add($request->id, $request->nama, $request->jumlahProduk, $request->harga)
            ->associate('App\Product');

        // dd($pengguna);

        $transaksi = Transaksi::where(['id_pembeli' => $pengguna, 'status' => null])->orderBy('updated_at', 'desc')->first();
        $produk = Product::findOrFail($request->id);
        // dd($transaksi);
        if($transaksi == null)
        {
            // dd($request->jumlahProduk);
            // dd($transaksi);

            $transaksi = new Transaksi;
            $transaksi->id_pembeli = $pengguna;
            $transaksi->save();

            // dd($transaksi);

            $produk->transaksis()->attach($transaksi->id, ['quantity' => $request->jumlahProduk]);
            // dd($request->jumlahProduct);
            // $produk->transaksis()->attach(['transaksi_id' => $transaksi->id, 'quantity' => $request->jumlahProduct]);

            // $produk->transaksis()->create([
            //     'id_pembeli' => $pengguna,
            //     // 'quantity' => $request->jumlahProduk,
            //     // 'quantity' => '1' 
            // ]);    

            // $produk->transaksis()->save('id_pembeli',$pengguna);

            // dd('masuk');

            // $produk->transaksis()->save();
            // $produk->transaksis()->save();
        }
        else
        // $produk->transaksis()->detach('transaksi_id', $transaksi->id);
        {

            $produk->transaksis()->attach($transaksi->id, ['quantity' => $request->jumlahProduk]);
            // dd('masuk');
            // $produk->transaksis()->attach($transaksi->id);
            // $produk->transaksis()->attach(['product_id' => $produk->id, 'transaksi_id' => $transaksi->id, 'quantity' => $request->jumlahProduct]);
        }
        // $transaksi = Transaksi::where(['id_pembeli' => $pengguna, 'status' => 0])->first();
        // dd($transaksi);
        // dd($transaksi->id);
            // $produk->transaksis()->attach(['product_id' => $produk->id, 'transaksi_id' => $transaksi->id, 'quantity' => $request->jumlahProduct]);

        // $produk = Product::findOrFail($request->id);
        // $produk->transaksis()->create([
        //     'id_pembeli' => $pengguna,
        //     // 'quantity' => '1'
            
        // ]);

        // $question = Question::create($request->question); // Save question.

        // $answersIds = [];
        // foreach ($request->answers as $answer) {
        // $answersIds [] = Answer::create($answer)->id; // Save each answer.
        // }

        // $question->answers()->attach($answersIds); // Attach answers to the question.

        // $user = auth()->user;
        // $user->transaksis()->create([
        //     'id_pembeli' => $user->id,

        // ]);


        // $keranjang = new Carts;
        // $keranjang->id_pembeli = auth()->user()->id;
        // $keranjang->id_produk = $request->id;
        // $keranjang->save();

        
        return redirect()->back()->with('success_message', 'Item was added to your cart');
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($rowId, $id)
    {
        Cart::remove($rowId);
        $pengguna = auth()->user()->id;
        $transaksi = Transaksi::where(['id_pembeli' => $pengguna, 'status' => null])->first();
        $produk = Product::findOrFail($id);
        $produk->transaksis()->detach('transaksi_id', $transaksi->id);
        // dd($id);
        // dd($id);


        // $keranjang = Carts::find($id);
        // $keranjang->delete();

        // return view('carts.index');

        return redirect()->back()->with('success_message', 'Item has been removed');
    }

    public function tambahDiskon(Request $request)
    {
        $pengguna = auth()->user()->id;
        $transaksi = Transaksi::where(['id_pembeli' => $pengguna, 'status' => null])->first();
        $coupon = Promo::where('kode', $request->kode)->first();

        if(!$coupon)
        {
            return redirect()->route('carts.index')->withErrors('Invalid coupon code. Please try again');
        }
        else if ($coupon->tanggal_selesai < $request->tanggalPromo)
        {
            return redirect()->route('carts.index')->withErrors('Masa berlaku promo telah berakhir');
        }
        session()->put('coupon', [
            'nama' => $coupon->kode,
            'value' =>$coupon->value,
            // 'discount' => $coupon->value(Cart::subtotal()),
            // 'discount' => $coupon->value(Cart::total()),
        ]);


        $transaksi->id_promo = $coupon->id;
        // dd($transaksi);
        // dd($transaksi->id_promo);
        
        $transaksi->save();




        return redirect()->route('carts.index')->with('success_message', 'Coupon has been applied');

        // dd($coupon);
        // return 'Adding Coupon';
    }

    public function hapusDiskon()
    {
        $pengguna = auth()->user()->id;
        $transaksi = Transaksi::where(['id_pembeli' => $pengguna, 'status' => null])->first();

        $transaksi->id_promo = null;
        $transaksi->save();
        return redirect()->route('carts.index')->with('success_message', 'Coupon has been deleted');
    }
}
