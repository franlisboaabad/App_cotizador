<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodosPago extends Model
{
    public $table = 'metodos_pago';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'descripcion','numero' ];

}
