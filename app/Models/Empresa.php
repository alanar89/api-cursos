<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable=[
    	'nombre',
    	'descripcion',
    	'telefono'
    ];

     public function alumno(){
		//return this->belongsTo('App\Empresa','idEmpresa');
		//return $this->belongsTo(Alumno::class,'idEmpresa');
    }
}
