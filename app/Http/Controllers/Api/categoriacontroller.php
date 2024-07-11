<?php

namespace App\Http\Controllers\Api;
use App\Models\categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoriacontroller extends Controller
{
    public function index()
    {
       //$categories=Category::all();
      // $categories=Category::included()->get();
    // $categories=Category::included()->filter();
    //  $categories=Category::included()->filter()->sort()->get();
      $categories=categoria::included()->filter()->sort()->getOrPaginate();
       return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories',

        ]);

        $categoria=categoria::create($request->all());

        return $categoria;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)//si se pasa $id se utiliza la comentada
    {
      // $category = Category::findOrFail($id);
     // $category = Category::with(['posts.user'])->findOrFail($id);
     // $category = Category::with(['posts'])->findOrFail($id);

     // $category = Category::included();
       $categoria = categoria::included()->findOrFail($id);
       return $categoria;
//http://api.codersfree1.test/v1/categories/1/?included=posts.user

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,'.$categoria->id,

        ]);

        $categoria->update($request->all());

        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        $categoria->delete();
        return $categoria;
    }
}

