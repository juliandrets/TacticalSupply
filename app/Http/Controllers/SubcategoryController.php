<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => array('create', 'edit', 'destroy')]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin-panel-categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel-create-subcategory', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Subcategory([
            'name'          => $request->input('name'),
            'category_id'   => $request->input('category_id'),
        ]);
        $category->save();

        return redirect('adm/categories?event=create-sub');
    }

    public function show($category, $subcategory)
    {
        $categories = Category::all();

        $categoryTitle = Category::where('name', $category)->first();
        $subcategory = Subcategory::where('name', $subcategory)->first();
        $products = Product::where('category_id', $categoryTitle->id)
            ->where('subcategory_id', $subcategory->id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        $latestProducts = Product::orderBy('id', 'desc')->take(2)->get();

        return view('subcategory', [
            'categoryTitle' => $categoryTitle,
            'categories' => $categories,
            'products' => $products,
            'subcategory' => $subcategory,
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
        $subCategory = Subcategory::find($id);
        $categories = Category::all();
        return view('admin-panel-edit-subcategory', [
            'subCategory' => $subCategory,
            'categories' => $categories
        ]);
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
        Subcategory::find($id)->update([
            'name'          => $request->input('name'),
            'category_id'   => $request->input('category_id')
        ]);
        
        return redirect('adm/categories?event=edit-sub');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Subcategory::find($id);
        $category->delete();

        return redirect('adm/categories?event=delete-sub');

    }
}
