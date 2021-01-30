<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class PemiliksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pemilik');
    }

    public function index()
    {
        // return view('pemiliks.index');
        $categories = Category::all();
        return view('pemiliks.index')->with('categories', $categories);
    }
    // public function create()
    // {
    //     return view('pemiliks.create');
    // }
    public function create()
    {
        // if (Auth::guard('pemilik')->check()=='pemilik')
        // {
        //     return view('pemiliks.create');
        // }
        // if (Auth::guard('karyawan')->check()=='karyawan')
        // {
        //     return view('karyawans.create');
        // }
        // else
        // {
            return view('pemiliks.create');
        // }
    }
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

        return redirect('/pemilik/create_category')->with('success', 'Category Created');
    }

    public function show($id)
    {
        $category = Category::find($id);
        // return dd($category);
        return redirect()->route('ProductsController',[$category]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('pemiliks.edit')->with('category', $category);
    }

    public function update (Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required'
        ]);

        // Create category
        $category = Category::find($id);
        $category->nama = $request->input('nama');
        
        $category->save();

        return redirect('/pemilik#kategori')->with('success', 'Category Updated');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/pemilik#kategori')->with('success', 'Category Removed');
    }
}
