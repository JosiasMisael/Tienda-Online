<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name'=>'required|min:3|max:100|unique:categories,name,'. $this->category->id,
            'description'=>'required|min:2|max:200'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'description'=>'descripcion'
        ];
    }


}
