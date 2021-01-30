<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class KaryawansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:karyawan');
    }

    public function index()
    {
        $categories = Category::all();
        return view('karyawans.index')->with('categories', $categories);
    }
    public function show($id)
    {
        $category = Category::find($id);
        // return dd($category);
        return redirect()->route('ProductsController',[$category]);
    }
}
