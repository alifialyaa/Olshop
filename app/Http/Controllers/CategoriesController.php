<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
// use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::all();
        // return view('index')->with('categories', $categories);

        
        // $categories = Category::all()->paginate(4);
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return view('pemiliks.create');
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return view('karyawans.create');
        }
        else
        {
            return view('categories.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
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
            $path = $request->file('foto')->storeAs('public/foto_kategori', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Create category
        $category = new Category;
        $category->nama = $request->input('nama');
        $category->foto = $fileNameToStore;
        $category->save();

        // ini muncul disini masihan

        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return redirect('/pemilik/create_category')->with('success', 'Category Created');
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return redirect('/pemilik/create_category')->with('success', 'Category Created');
        }
        

        // return redirect('/pemilik/create_category')->with('success', 'Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $category = Category::find($id);
        // $category = Category::find($nama);
        // return view('products.index')->with('category', $category);
        // \Session::put($nama, $category->nama);
        // return redirect ('/produk')->with('category', $category);
        // return redirect()->route('ProductsController',[$category]);
        // ->with('category', $category);

        // return $category;

        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            // return redirect()->route('ProductsController',[$category]);
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return redirect()->route('ProductsController',[$category]);
        }
        else
        {
            return redirect()->route('ProductsController',[$category]);
        }

        // return redirect()->route('ProductsController',[$category]);

        // $request->attributes->add(['category' => $request->category]);
        // return redirect ('/produk')->with('category', $request);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (Auth::guard('pemilik')->check()=='pemilik')
        {
            return view('pemiliks.edit')->with('category', $category);
        }
        if (Auth::guard('karyawan')->check()=='karyawan')
        {
            return view('karyawans.edit')->with('category', $category);
        }
        else
        {
            return view('categories.edit')->with('category', $category);route('ProductsController',[$category]);
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
        $this->validate($request,[
            'nama' => 'required'
        ]);

        // Create category
        $category = Category::find($id);
        $category->nama = $request->input('nama');
        
        $category->save();

        return redirect('/index#kategori')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

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
