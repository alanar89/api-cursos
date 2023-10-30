<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprecioRequest;
use App\Http\Requests\UpdateprecioRequest;
use Illuminate\Http\Response;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios=Precio::all();
        return response()->json([
            'data'=>$precios,
            'status'=>Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprecioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprecioRequest $request)
    {
        $precio=Precio::create($request->all());
        return response()->json([
            'mensaje'=>'EL precio se creo correctamente',
            'data'=>$precio,
            'status'=>Response::HTTP_CREATED,
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show(precio $precio)
    {
         return response()->json([
            'data'=>$precio,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function edit(precio $precio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprecioRequest  $request
     * @param  \App\Models\precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprecioRequest $request, precio $precio)
    {
        $precio->update($request->all());
        return response()->json([
            'mensaje'=>'EL precio se actualizo correctamente',
            'data'=>$precio,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy(precio $precio)
    {
        $precio->delete();
         return response()->json([
            'mensaje'=>'EL precio se elimino correctamente',
            'data'=>$precio,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }
}
