<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
          'category_id' => 'required',
          'product_name' => 'required',
          'products_shot_details' => 'required',
          'products_long_details' => 'required',
          'product_price' => 'required|numeric',
          'product_quantity' => 'required|numeric',
          'alert_uantity' => 'required|numeric',
        ];
    }
}
