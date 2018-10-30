<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => array('create', 'edit', 'destroy')]);
    }

    public function index()
    {
        $brands = Brand::all()->sortBy("name");
        return view('admin-panel-brands', ['brands' => $brands]);
    }

    public function brandSection($name) {

        $brands = Brand::orderBy('name', 'asc')->get();

        $brandTitle = Brand::where('name', $name)->first();

        $products = Product::where('brand', $name)->orderBy('id', 'desc')->paginate(20);


        return view('brands', [
            'brandTitle' => $brandTitle,
            'brands' => $brands,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel-create-brand');
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
            $destinationPath = public_path('/uploads/brands/');
            $image->move($destinationPath, $name);
        } else {
            $name = 'sinfoto.jpg';
        }

        $brand = new Brand([
            'name' => $request->input('name'),
            'picture' => $name
        ]);

        $brand->save();

        return redirect('adm/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin-panel-edit-brand', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // si hay un request de una imagen, la subo y actualizo
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/brands/');
            $image->move($destinationPath, $name);

            Brand::find($id)->update([
                'name' => $request->input('name'),
                'picture' => $name
            ]);

            return redirect('adm/brands');
        }

        // si no hay un request de una imagen, actualizo sin tocar el campo de imagen
        Brand::find($id)->update([
            'name' => $request->input('name')
        ]);
        
        return redirect('adm/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('adm/brands');
    }
}
