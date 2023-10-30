<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable=[
    	'nombre',
    	'apellido',
    	'email',
    	'estado',
    	'telefono',
    	'idEmpresa'
    ];

    public function empresa(){
		//return $this->belongsTo(Empresa::class,'idEmpresa');
		return $this->belongsTo(Empresa::class,'idEmpresa');
    }
}
