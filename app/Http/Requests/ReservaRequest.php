<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'fecha_llegada' => 'required',
            'fecha_salida' => 'required',
            'precio_tour' => 'required',
            'cantidad_personas' => 'required',
            'total_tours' => 'required',
            'total_reserva'=> 'required',
            'pago_reserva'=> 'required',
        ];
    }
}
