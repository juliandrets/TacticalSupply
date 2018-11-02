<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => array('create', 'edit', 'destroy')]);
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin-panel-products', ['products' => $products]);
    }

    public function showOferts() {
        $categories = Category::all();
        $products = Product::where('ofert', '>', 0)->paginate(20);
        $latestProducts = Product::orderBy('id', 'desc')->take(2)->get();
        return view('oferts', [
            'categories' => $categories, 
            'products' => $products,
            'latestProducts' => $latestProducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('role:admin');

        $categories = Category::all()->sortBy("name");
        $brands = Brand::all()->sortBy("name");
        $subcategories = Subcategory::all();

        return view('admin-panel-create-product', [
            'categories'     => $categories,
            'brands'         => $brands,
            'subcategories'  => $subcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products/');
            $image->move($destinationPath, $name);
        } else {
            $name = 'sinfoto.jpg';
        }

        // si ofert no esta activado no seteamos el ofert_date
        if (!$request->input('ofert')) {
            $ofert_date = null;
        } else if ($request->input('ofert')) {
            if ($request->input('ofert') == "on") {
                $ofert = 1;
            } else {
                $ofert = 0;
            }
        }

        // si la fecha es nula le asignamos nulo
        if ($request->input('ofert_date')) {
            $ofert_date = $request->input('ofert_date');
        } else {
            $ofert_date = null;  
        }

        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category' => $request->input('category'),
            'subcategory' => $request->input('subcategory'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'ofert' => $ofert,
            'ofert_date' => $ofert_date,
            'picture' => $name
        ]);

        $product->save();

        return redirect('adm/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $brand = Brand::where('name', $product->brand)->first();
        return view('product-show', ['product' => $product, 'brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all()->sortBy("name");;
        return view('admin-panel-edit-product', 
            ['product' => $product, 'categories' => $categories, 'brands' => $brands]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        // si la fecha es nula le asignamos nulo
        if($request->input('ofert_date')) {
            $ofert_date = $request->input('ofert_date');
        } else {
            $ofert_date = null;  
        }

        // si hay un request de una imagen, la subo y actualizo
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products/');
            $image->move($destinationPath, $name);

            Product::find($id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'category' => $request->input('category'),
                'brand' => $request->input('brand'),
                'description' => $request->input('description'),
                'ofert' => $request->input('ofert'),
                'ofert_date' => $ofert_date,
                'picture' => $name
            ]);

            return redirect('adm');
        }

        // si no hay un request de una imagen, actualizo sin tocar el campo de imagen
        Product::find($id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category' => $request->input('category'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'ofert' => $request->input('ofert'),
            'ofert_date' => $ofert_date
        ]);
        
        return redirect('adm');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('adm');
    }
}
