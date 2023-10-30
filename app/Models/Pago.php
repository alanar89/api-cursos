<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

     protected $fillable=[
     	'nombre',
     	'descripcion',
     	'precio'
     ];

     public function alumno(){

     	 return $this->belongsTo(Alumno::class);
     } 

     public function costo(){

     	return $this->belongsTo(Precio::class);
     }
}
