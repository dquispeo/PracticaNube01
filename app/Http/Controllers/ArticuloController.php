<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use Validator;
use Auth;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexartis = Articulo::all();
        $indexartis = Articulo::orderBy('id','ASC')->get();
        return view('articulo.index')->with('indexartis', $indexartis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        $storeartis = Articulo::create($request->all());
        return back()->with('status','Artículo creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editartis=Articulo::find($id);
        return view('articulo.edit')->with('editartis', $editartis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloRequest $request, $id)
    {
     $updateartis=Articulo::find($id);
     $updateartis->descripcion=$request->descripcion;
     $updateartis->precio=$request->precio;
     $updateartis->stock=$request->stock;
     $updateartis->save();
     return redirect()->route('articulos.index')->with('status','Artículo editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyartis = Articulo::find($id)->delete();
         return back()->with('status','Artículo eliminado');
    }
}
