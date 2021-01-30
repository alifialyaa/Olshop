<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
// use Session;
use App\Category;
use App\Transaksi;
use App\Ulasan;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($category)
    {
        // return Category::find($id);
        // Session::get($nama);
        // $category = Category::find($id);
        
        // $products = Product::all();
        $categories = Category::find($category);
        // $products = Product::select('SELECT * FROM products WHERE kategori='Tas'');
        $products = DB::table('products')->where('kategori', $categories->nama)->get();

        // return $category->nama;
        // $category= app('request')->get('category');
        // return $categories;
        // return $products;
        // return masuk;
        // return view ('products.index');

        // if(Auth::guard('pemilik')->check())
        // {
        //     return view('pemiliks.Products.index')->with('categories', $categories)->with('products', $products);
        // }
        // else
        // {}
    
        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return view('pemiliks.products.index')->with('categories', $categories)->with('products', $products);
            // return dd($products);
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return view('karyawans.products.index')->with('categories', $categories)->with('products', $products);
        }
        else
        {
            // return dd($categories->nama);
            return view('products.index')->with('categories', $categories)->with('products', $products);
        }
        
        // return dd($categories);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Category::find($id);
        // $kategori = Category::find($categories);
        // return redirect('products/create')->with('category', $category);
        
        // if(Auth::guard('pemilik')->check())
        // {
        //     return view('pemiliks.products.create')->with('category', $category);
        // }

        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return view('pemiliks.products.create')->with('category', $category);
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return view('karyawans.products.create')->with('category', $category);
        }
    
            return view('products.create')->with('category', $category);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $kategori = Category::find($categories);
        $this->validate($request,[
            'nama' => 'required',
            'deskripsiSingkat' => 'required',
            'deskripsiPanjang' => 'required',
            'berat' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'foto1' => 'image|nullable|max:1999',
            'foto2' => 'image|nullable|max:1999',
            'foto3' => 'image|nullable|max:1999'
        ]);

        // handle file upload
        if($request->hasFile('foto1')){
            // get filename with the extension
            $filenameWithExt1 = $request->file('foto1')->getClientOriginalName();
            // get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // get just ext
            $extension1 = $request->file('foto1')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // upload image
            $path = $request->file('foto1')->storeAs('public/foto_produk', $fileNameToStore1);
        }
        else{
            $fileNameToStore1 = 'noimage.jpg';
        }

        if($request->hasFile('foto2')){
            // get filename with the extension
            $filenameWithExt2 = $request->file('foto2')->getClientOriginalName();
            // get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // get just ext
            $extension2 = $request->file('foto2')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // upload image
            $path = $request->file('foto2')->storeAs('public/foto_produk', $fileNameToStore2);
        }
        else{
            $fileNameToStore2 = 'noimage.jpg';
        }

        if($request->hasFile('foto3')){
            // get filename with the extension
            $filenameWithExt3 = $request->file('foto3')->getClientOriginalName();
            // get just filename
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            // get just ext
            $extension3 = $request->file('foto3')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // upload image
            $path = $request->file('foto3')->storeAs('public/foto_produk', $fileNameToStore3);
        }
        else{
            $fileNameToStore3 = 'noimage.jpg';
        }

        // Create category
        $product = new Product;
        $product->nama = $request->input('nama');
        $product->deskripsiSingkat = $request->input('deskripsiSingkat');
        $product->deskripsiPanjang = $request->input('deskripsiPanjang');
        $product->berat = $request->input('berat');
        $product->warna = $request->input('warna');
        $product->ukuran = $request->input('ukuran');
        $product->stok = $request->input('stok');
        $product->harga = $request->input('harga');
        $product->kategori = $request->input('kategori');
        // $product->kategori = $kategori->nama;
        $product->foto1 = $fileNameToStore1;
        $product->foto2 = $fileNameToStore2;
        $product->foto3 = $fileNameToStore3;
        $product->save();

        // if(Auth::guard('pemilik')->check())
        // {
        //     // return view('pemiliks.products.index');
        //     // return redirect('/pemilik/{category}')->route('ProductsController',[$category]);
        //     return redirect('/pemilik');
        // }
        // return redirect()->route('ProductsController',[$category]);
        // return redirect('/index/{{category}}')->with('success', 'Category Created');
        
        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return redirect('/pemilik');
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return redirect('/karyawan');
            
        }
        else
        {
            return redirect('/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return view('pemiliks.products.show')->with('product', $product);
            // return dd($id);
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return view('karyawans.products.show')->with('product', $product);
        }
        else
        {
            // JIKA BUKAN USER
            if(!Auth::user())
            {
                // dd('masuk');
                $transaksi = null;
                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating FROM users p, ulasans u, products pr, transaksis t, product_transaksi pt WHERE u.id_transaksi=t.id and t.id=pt.transaksi_id and pt.product_id=pr.id and t.id_pembeli=u.id and pr.id='$id'") );
                $ulasanViews = DB::select( DB::raw("SELECT p.`name`, tb.deskripsi , tb.rating
                FROM users p, ( SELECT t.`id`, t.`id_pembeli`, pt.`product_id`, u.`deskripsi`,u.`rating` 
                  FROM transaksis t, ulasans u, product_transaksi pt
                  WHERE t.`id`=pt.`transaksi_id` AND u.`id_transaksi`=t.`id` AND pt.`product_id`=$product->id) tb
                WHERE p.`id`=tb.id_pembeli;") );
                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating 
                // FROM users p, ulasans u, transaksis t, product_transaksi pt 
                // WHERE u.id_transaksi=t.id 
                // AND t.id=pt.transaksi_id 
                // AND t.id_pembeli=u.id 
                // AND pt.product_id='1' 
                // AND p.`id` IN  (SELECT t.id_pembeli 
                //     FROM transaksis t, ulasans u 
                //     WHERE t.`id`=u.`id_transaksi` 
                //     AND t.status=1 AND u.`deskripsi`IS NOT NULL)") );
                $ulasan = null;
                // return view('products.show')->with('product', $product)->with('ulasanViews', $ulasanViews);
                return view('products.show')->with('product', $product)->with('transaksi', $transaksi)->with('ulasan', $ulasan)->with('ulasanViews', $ulasanViews);
            }

            $id_pembeli = auth()->user()->id;
            // dd($id_pembeli);
            $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();
            // dd($transaksi);

            // if($transaksi == null)
            // {
            //     dd('nullll');
            // }

            // JIKA BELUM MELAKUKAN PEMBELIAN
            // dd($transaksi);
            if($transaksi == null)
            {
                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating FROM users p, ulasans u, products pr, transaksis t, product_transaksi pt WHERE u.id_transaksi=t.id and t.id=pt.transaksi_id and pt.product_id=pr.id and t.id_pembeli=u.id and pr.id='$id'") );
                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating 
                // FROM users p, ulasans u, transaksis t, product_transaksi pt 
                // WHERE u.id_transaksi=t.id and t.id=pt.transaksi_id and t.id_pembeli=u.id and pt.product_id='$id' and p.id in (SELECT id_pembeli from transaksis where status=1)") );

                $ulasanViews = DB::select( DB::raw("SELECT p.`name`, tb.deskripsi , tb.rating
                FROM users p, ( SELECT t.`id`, t.`id_pembeli`, pt.`product_id`, u.`deskripsi`,u.`rating` 
                  FROM transaksis t, ulasans u, product_transaksi pt
                  WHERE t.`id`=pt.`transaksi_id` AND u.`id_transaksi`=t.`id` AND pt.`product_id`=$product->id) tb
                WHERE p.`id`=tb.id_pembeli;") );

                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating 
                // FROM users p, ulasans u, transaksis t, product_transaksi pt 
                // WHERE u.id_transaksi=t.id 
                //     AND t.id=pt.transaksi_id 
                //     AND t.id_pembeli=u.id 
                //     AND pt.product_id='1' 
                //     AND p.`id` IN  (SELECT t.id_pembeli 
                // FROM transaksis t, ulasans u 
                // WHERE t.`id`=u.`id_transaksi` 
                //     AND t.status=1 AND u.`deskripsi`IS NOT NULL)") );
                $ulasan = null;
                // dd('masuk');
                // return view('products.show')->with('product', $product)->with('ulasanViews', $ulasanViews);
                return view('products.show')->with('product', $product)->with('transaksi', $transaksi)->with('ulasan', $ulasan)->with('ulasanViews', $ulasanViews);
            }
            
            // JIKA SUDAH MELAKUKAN PEMBELIAN
            else
            {
                $ulasan = Ulasan::Where(['id_transaksi' => $transaksi->id, 'id_produk' => $id])->first();
                // dd($id);
                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating FROM users p, ulasans u, products pr, transaksis t, product_transaksi pt WHERE u.id_transaksi=t.id and t.id=pt.transaksi_id and pt.product_id=pr.id and t.id_pembeli=u.id and pr.id='$id'") );

                $ulasanViews = DB::select( DB::raw("SELECT p.`name`, tb.deskripsi , tb.rating
                FROM users p, ( SELECT t.`id`, t.`id_pembeli`, pt.`product_id`, u.`deskripsi`,u.`rating` 
                  FROM transaksis t, ulasans u, product_transaksi pt
                  WHERE t.`id`=pt.`transaksi_id` AND u.`id_transaksi`=t.`id` AND pt.`product_id`=$product->id) tb
                WHERE p.`id`=tb.id_pembeli;") );

                // $ulasanViews = DB::select( DB::raw("SELECT p.name, u.deskripsi, u.rating 
                // FROM users p, ulasans u, transaksis t, product_transaksi pt 
                // WHERE u.id_transaksi=t.id 
                // AND t.id=pt.transaksi_id 
                // AND t.id_pembeli=u.id 
                // AND pt.product_id='1' 
                // AND p.`id` IN  (SELECT t.id_pembeli 
                //     FROM transaksis t, ulasans u 
                //     WHERE t.`id`=u.`id_transaksi` 
                //     AND t.status=1 AND u.`deskripsi`IS NOT NULL)") );
                // dd($transaksi->id);
                // if($ulasan == )
                // {
                //     $ulasan = null;
                //     // dd($ulasan);
                // }


                return view('products.show')->with('product', $product)->with('transaksi', $transaksi)->with('ulasan', $ulasan)->with('ulasanViews', $ulasanViews);
            }

            

            
            // $ulasanViews = Ulasan::Where('id_produk', $product->id)->orderBy('updated_at', 'desc')->get();

            

            // $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('upload_time', 'desc')->first();

            // if($transaksi == null)
            // {
            //     dd('null ternyata');
            // }
            // dd($transaksi);
            // dd($ulasanViews);
            
            // return dd($id);
        }
        // return dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return view ('pemiliks.products.edit')->with('product', $product);
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return view ('karyawans.products.edit')->with('product', $product);
        }
        else
        {
            return view ('products.edit')->with('product', $product);
        }
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
        // $kategori = Category::find($categories);
        $this->validate($request,[
            'nama' => 'required',
            'deskripsiSingkat' => 'required',
            'deskripsiPanjang' => 'required',
            'berat' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        // Create category
        $product = Product::find($id);
        $product->nama = $request->input('nama');
        $product->deskripsiSingkat = $request->input('deskripsiSingkat');
        $product->deskripsiPanjang = $request->input('deskripsiPanjang');
        $product->berat = $request->input('berat');
        $product->warna = $request->input('warna');
        $product->ukuran = $request->input('ukuran');
        $product->stok = $request->input('stok');
        $product->harga = $request->input('harga');
        $product->save();

        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return redirect('/pemilik#kategori');
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return redirect('/karyawan#kategori');
        }
        else
        {
            return redirect('/index#kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return redirect('/pemilik#kategori')->with('success', 'Category Removed');
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return redirect('/karyawan#kategori')->with('success', 'Category Removed');
        }
        else
        {
            return redirect('/index#kategori')->with('success', 'Category Removed');
        }
    }
}
