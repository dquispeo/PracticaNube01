<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulos';

  protected $fillable = [
    'id','descripcion','precio','stock',
  ];

  protected $primaryKey = 'id';
}
