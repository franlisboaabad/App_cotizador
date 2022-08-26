<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cliente_id', 'metodo_id', 'producto_id','caja_id','precio','cantidad','total_venta'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function metodo()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
