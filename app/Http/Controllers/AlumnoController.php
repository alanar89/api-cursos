<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorealumnoRequest;
use App\Http\Requests\UpdatealumnoRequest;
use Illuminate\Http\Response;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $alumnos=Alumno::all();
        return response()->json([
            'data'=>$alumnos,
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
        // return Precio::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorealumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorealumnoRequest $request)
    {
         $alumno=Alumno::create($request->all());
        return response()->json([
            'mensaje'=>'El alumno se creo correctamente',
            'data'=>$alumno,
            'status'=>Response::HTTP_CREATED,
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(alumno $alumno)
    {
         $empresa=$alumno->empresa;
          return response()->json([
            'data'=>$alumno,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatealumnoRequest  $request
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatealumnoRequest $request, alumno $alumno)
    {
         $alumno->update();
         return response()->json([
            'mensaje'=>'El alumno se actualizo correctamente',
            'data'=>$alumno,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumno $alumno)
    {
         $alumno->delete();
         return response()->json([
            'mensaje'=>'EL alumno se elimino correctamente',
            'data'=>$alumno,
            'status'=>Response::HTTP_OK,
        ],Response::HTTP_OK);
    }
}
