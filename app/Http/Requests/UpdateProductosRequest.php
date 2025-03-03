<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        $idProducto = $this->route('producto'); // Obtiene el ID del producto desde la URL
        return [
            "nombre"=>"required|string|min:2",
            "codigo"=> [
                "required",
                "integer",
                    Rule::unique("productos", "codigo")->ignore($idProducto), // Ignora el ID del producto actual
            ],
            "unidades"=>"required|integer",
            "familia"=>"required|string",
            "proveedor_id"=>"required|integer",
        ];
    }
    public function messages(): array {
        return [
            "nombre.required" => "El nombre es requerido",
            "nombre.min" => "El nombre debe tener al menos 2 caracteres",
            "codigo.required" => "El código es requerido",
            "codigo.unique" => "El codigo ya existe",
            "unidades.required" => "Se necesitan especificar las unidades",
            "familia.required" => "Es necesario especificar la familia del producto",
            "proveedor_id.required" => "El proveedor es requerido",
        ];
    }
}
