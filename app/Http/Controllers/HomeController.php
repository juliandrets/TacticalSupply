<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // index solapas
        $lastProducts = Product::limit(8)->orderBy('id', 'desc')->get();

        // brands section
        $brands = Brand::all();

        //category section
        $categories = Category::all();

        return view('index', [
            'lastProducts' => $lastProducts,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function faqs() {
        return view('faqs');
    }
}
