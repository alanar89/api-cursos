<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreempresaRequest;
use App\Http\Requests\UpdateempresaRequest;
use Illuminate\Http\Response;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $empresas=Empresa::all();
        return response()->json([
            'data'=>$empresas,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreempresaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreempresaRequest $request)
    {
          $empresa=Empresa::create($request->all());
        return response()->json([
            'mensaje'=>'La empresa se creo correctamente',
            'data'=>$empresa,
            'status'=>Response::HTTP_CREATED,
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
         return response()->json([
            'data'=>$empresa,
              'empresa'=>$empresa->alumno,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateempresaRequest  $request
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateempresaRequest $request, empresa $empresa)
    {
         $empresa->update();
         return response()->json([
            'mensaje'=>'La empresa se actualizo correctamente',
            'data'=>$empresa,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(empresa $empresa)
    {
          $empresa->delete();
         return response()->json([
            'mensaje'=>'La empresa se elimino correctamente',
            'data'=>$empresa,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }
}
