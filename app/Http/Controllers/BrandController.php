<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $model = Brand::class;

    public function __construct()
    {
        $this->middleware('role:admin', ['only' => array('create', 'edit', 'destroy')]);
    }

    public function index()
    {
        $brands = $this->model::orderBy('id', 'desc')->paginate(20);
        return view('admin-panel-brands', ['brands' => $brands]);
    }

    public function brandSection($name) {

        $brands     = $this->model::orderBy('name', 'asc')->get();
        $brandTitle = $this->model::where('name', $name)->first();
        $products   = $this->model::where('brand', $name)->orderBy('id', 'desc')->paginate(20);

        return view('brands', [
            'brandTitle' => $brandTitle,
            'brands' => $brands,
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin-panel-create-brand');
    }

    public function store(Request $request)
    {
        // save picture
        $picture = $this->createPicture($request, 'brands');

        // save brand
        $model = new $this->model([
            'name' => $request->input('name'),
            'picture' => $picture
        ]);
        $model->save();

        // return
        return redirect('adm/brands');
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit($id)
    {
        $model = $this->model::find($id);
        return view('admin-panel-edit-brand', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        // find model
        $model = $this->model::find($id);

        // save picture
        $picture = $this->updatePictures($request, $model->picture, 'brands');

        // si no hay un request de una imagen, actualizo sin tocar el campo de imagen
        $model->update([
            'name'    => $request->input('name'),
            'picture' => $picture,
        ]);
        
        return redirect('adm/brands');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('adm/brands');
    }
}
