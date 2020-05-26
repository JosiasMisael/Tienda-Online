<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\Request;



class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $buscar = $request->get('name');

       if($buscar === '')
       {
      $productos =  Product::paginate(4);
       }
       else
       {
        $productos = Product::where('name','like','%'.$buscar.'%')->paginate(4);
       }

       return view('admin.product.index', compact('productos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $categories = Category::select('id','name')->get();
    // dd($categories);
     return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        $request->validated();
        $prod = new Product();
        $prod->name = $request->name;
        $prod->category_id = $request->category_id;
        $prod->quantity = $request->quantity;
        $prod->actual_price = $request->actual_price;
        $prod->previous_price = $request->previous_price;
        $prod->discount = $request->discount;
        $prod->short_description = $request->short_description;
        $prod->long_description = $request->long_description;
        $prod->specification = $request->specification;
        $prod->date_of_interest = $request->date_of_interest;
        $prod->product_status = $request->product_status;

        if ($request->status)
        {
            $prod->status ='1';
        }else
        {
            $prod->status ='0';
        }

        if ($request->slider)
        {
            $prod->slider ='1';
        }else
        {
            $prod->slider ='0';
        }

        $prod->save();
        return redirect()->route('admin.product.index')->with('datos',' ¡Registro del Producto creado correctamente') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
