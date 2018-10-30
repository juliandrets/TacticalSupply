<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$products = Product::orderBy('id', 'desc')->paginate(10);

    	return view('admin-panel', ['products' => $products]);
    }
}
