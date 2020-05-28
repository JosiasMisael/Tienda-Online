<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name'=>'required|unique:App\Product,name',
            'category_id'=>'required|integer',
            'quantity' => 'required|integer',
            'actual_price' =>'required|integer',
            'previous_price'=>'required|integer',
            'discount'=>'required|integer',
            'short_description'=>'required|min:4',
            'long_description'=>'|min:2',
            'specification'=>'|min:3',
            'date_of_interest'=>'|min:3',
            'view'=>'sometimes',
            'sales'=>'sometimes',
            'product_status'=>'sometimes|min:1',
            'status'=>'sometimes|boolean',
            'slider'=>'sometimes|boolean',
            'images.*'=>'image|mimes:jpeg,png,jpg,gif,svg'

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'quantity' => 'cantidad',
            'actual_price' =>'precio actual',
            'previous_price'=>'precio anterior',
            'discount'=>'descuento',
            'short_description'=>'descripción corta',
            'long_description'=>'descripción largar',
            'specification'=>'especificaciones',
            'date_of_interest'=>'datos de interes',
            'view'=>'vistas',
            'sales'=>'ventas',
            'product_status'=>'estado del producto'
        ];
    }
}
