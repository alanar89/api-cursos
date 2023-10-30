<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepagoRequest;
use App\Http\Requests\UpdatepagoRequest;
use Illuminate\Http\Response;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $pagos=Pago::all();
        return response()->json([
            'data'=>$pagos,
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
     * @param  \App\Http\Requests\StorepagoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepagoRequest $request)
    {
          $pago=Pago::create($request->all());
        return response()->json([
            'mensaje'=>'El pago se creo correctamente',
            'data'=>$pago,
            'status'=>Response::HTTP_CREATED,
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(pago $pago)
    {       
          return response()->json([
            'data'=>$pago,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepagoRequest  $request
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepagoRequest $request, pago $pago)
    {
         $pago->update($request->all());
        return response()->json([
            'mensaje'=>'EL pago se actualizo correctamente',
            'data'=>$pago,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {
        $pago->delete();
         return response()->json([
            'mensaje'=>'El pago se elimino correctamente',
            'data'=>$pago,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }
}
