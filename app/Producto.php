<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'stock','imagen'
    ];


    
    public function getGetImagenAttribute()
    {
        if ($this->imagen) {
            return url("storage/$this->imagen");
        }else{
            return url("/page/images/producto_default.png");
        }
    }

}
