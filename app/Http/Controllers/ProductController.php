<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    protected $model = Product::class;
    protected $route = 'products';

    public function __construct()
    {
        $this->middleware('role:admin', ['only' => array('create', 'edit', 'destroy')]);
    }

    public function index()
    {
        $products = $this->model::orderBy('id', 'desc')->paginate(10);

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

    public function store(Request $request)
    {
        // Save pictures
        $picture = $this->createPicture($request, 'products');

        // si ofert no esta activado no seteamos el ofert_date
        if (!$request->input('ofert')) {
            $ofert_date = null;
            $ofert      = 0;
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
            'currency' => $request->input('currency'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('category'),
            'subcategory_id' => $request->input('subcategory'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'ofert' => $ofert,
            'ofert_date' => $ofert_date,
            'picture' => $picture
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
        $this->middleware('role:admin');

        $categories = Category::all()->sortBy("name");
        $brands = Brand::all()->sortBy("name");
        $subcategories = Subcategory::all();

        return view('admin-panel-edit-product', [
            'model'          => $product,
            'categories'     => $categories,
            'brands'         => $brands,
            'route'          => $this->route,
            'subcategories'  => $subcategories
        ]);
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
        // si ofert no esta activado no seteamos el ofert_date
        if (!$request->input('ofert')) {
            $ofert_date = null;
            $ofert      = 0;
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

        // Find model
        $model = $this->model::find($id);

        // Save pictures
        $picture = $this->updatePictures($request, $model->picture, 'products');

        $model->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('category'),
            'subcategory_id' => $request->input('subcategory'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'currency' => $request->input('currency'),
            'ofert' => $ofert,
            'ofert_date' => $ofert_date,
            'picture' => $picture
        ]);

        return redirect('adm/products/?event=update');
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
        return redirect('adm/products/?event=delete');
    }

    // Admin Filters
    public function nameFilter()
    {
        $name = Input::get('name');
        $data = Product::where('name', 'like', '%'.$name.'%')->paginate(10);

        return view('admin-panel-products',
            ['products' => $data]
        );
    }
}
