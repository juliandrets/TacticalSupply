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
        $soldProducts = Product::where('sold','>',0)->take(10)->orderBy('sold', 'desc')->get();
        $ofertProducts = Product::where('ofert','>',0)->take(10)->orderBy('ofert', 'desc')->get();
        $lastProducts = Product::limit(10)->orderBy('id', 'desc')->get();

        // tv section
        $tvProducts = Product::where('category', 'Televisores')->take(4)->orderBy('id', 'desc')->get();

        // desktop section
        $desktopProducts = Product::where('category', 'Desktop')->take(7)->orderBy('id', 'desc')->get();

        // phones section
        $phonesProducts = Product::where('category', 'Celulares')->take(7)->orderBy('id', 'desc')->get();

        // audio section
        $audioProducts = Product::where('category', 'Audio & Musica')->take(7)->orderBy('id', 'desc')->get();

        // brands section
        $brands = Brand::all();

        //category section
        $categories = Category::all();

        return view('index', [
            'lastProducts' => $lastProducts,
            'ofertProducts' => $ofertProducts,
            'soldProducts' => $soldProducts,
            'tvProducts' => $tvProducts,
            'desktopProducts' => $desktopProducts,
            'phonesProducts' => $phonesProducts,
            'audioProducts' => $audioProducts,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function faqs() {
        return view('faqs');
    }
}
