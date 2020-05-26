<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\CategoryCreateREquest;
use App\Http\Requests\Categoria\CategoryUpdateRequest;
use Illuminate\Http\Request;



class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->name;
        if($busqueda === ''){
        $categorias = Category::orderBy('name')->paginate(3);
        }else
        {
          $categorias = Category::where('name','like', '%'.$busqueda.'%')->orderBy('name')->paginate(3);
        }

        return view('admin.category.index', compact('categorias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateREquest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.category.index')->with('datos','¡Registros creados correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $editar = 'si';
        return view('admin.category.show', compact('category','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $editar = 'si';
        return view('admin.category.edit', compact('category','editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->fill($request->validated());
        $category->save();
        return redirect()->route('admin.category.index')->with('datos','¡Registros actualizados correctamente!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {

         $eliminar = Category::findOrFail($category);
         $eliminar->delete();
         return ['redirect' => route('admin.category.index')];




    }
}
