<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => array('create', 'edit', 'destroy')]);
    }

    public function index()
    {
        $categories = Category::all();
        $subCategories = Subcategory::all();
        return view('admin-panel-categories', [
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel-create-category');
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
            $destinationPath = public_path('/uploads/categories/');
            $image->move($destinationPath, $name);
        } else {
            $name = 'sinfoto.jpg';
        }

        $category = new Category([
            'name' => $request->input('name'),
            'picture' => $name
        ]);
        $category->save();


        return redirect('adm/categories?event=create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $categories = Category::all();

        $categoryTitle = Category::where('name', $name)->first();

        $products = Product::where('category', $name)->orderBy('id', 'desc')->paginate(20);

        $latestProducts = Product::orderBy('id', 'desc')->take(2)->get();

        return view('category', [
            'categoryTitle' => $categoryTitle,
            'categories' => $categories,
            'products' => $products,
            'latestProducts' => $latestProducts
        ]);
    }
    public function showWithFilterPrice(Request $request, $name)
    {
        $min = $request->input('min');
        $max = $request->input('max');

        $categories = Category::all();

        $categoryTitle = Category::where('name', $name)->first();

        $products = Product::where('category', $name)->where('price','>=',$min)->where('price','<=',$max)->orderBy('id', 'desc')->paginate(20);

        // para el aside
        $latestProducts = Product::take(2)->orderBy('id', 'desc');

        return view('category', [
            'categoryTitle' => $categoryTitle,
            'categories' => $categories,
            'products' => $products,
            'latestProducts' => $latestProducts
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin-panel-edit-category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // si hay un request de una imagen, la subo y actualizo
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/categories/');
            $image->move($destinationPath, $name);

            Category::find($id)->update([
                'name' => $request->input('name'),
                'picture' => $name
            ]);

            return redirect('adm/categories');
        }

        // si no hay un request de una imagen, actualizo sin tocar el campo de imagen
        Category::find($id)->update([
            'name' => $request->input('name')
        ]);
        
        return redirect('adm/categories?event=edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('adm/categories?event=delete');

    }
}
