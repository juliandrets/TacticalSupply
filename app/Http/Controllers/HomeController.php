<?php

namespace App\Http\Controllers;

use App\Slider;
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

        //category section
        $sliders = Slider::all();

        return view('index', [
            'lastProducts' => $lastProducts,
            'brands' => $brands,
            'categories' => $categories,
            'sliders' => $sliders
        ]);
    }

    public function faqs() {
        return view('faqs');
    }
}
