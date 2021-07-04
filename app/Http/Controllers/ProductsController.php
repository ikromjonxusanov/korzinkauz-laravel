<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Rules\CategoryId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $products = Product::orderByDesc('id')->paginate(25);
            $categorys = Category::all();
            return view('products.index', ["products"=>$products, "categorys"=>$categorys]);
        } else {
            return redirect(route('home'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('products.create', ['categorys'=>$categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'price'=>'required',
                'category_id'=>['required', 'integer', new CategoryId],
                'status'=>''
            ]
        );
        if (array_key_exists("status", $data)===false){
            $data['status'] = 0;
        }
        Product::create($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categorys = Category::all();
        return view('products.show', ["product"=>$product, "categorys"=>$categorys]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categorys = Category::all();
        return view('products.edit', ["product"=>$product, "categorys"=>$categorys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'price'=>'required',
                'category_id'=>['required', 'integer', new CategoryId],
                'status'=>'required'
            ]
        );
        if (array_key_exists("status", $data)===false){
            $data['status'] = 0;
        }
        $product->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');

    }
}
