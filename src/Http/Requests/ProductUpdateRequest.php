<?php

namespace DesignByCode\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'sku' => 'nullable|string|unique:products,sku,' . $this->id,
            'name' => 'required|string|unique:products,name,' . $this->id,
            'price' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/'],
            'sales_price' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/', 'lt:price'],
            'excerpt' => 'nullable|string|max:300',
            'content' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'sales_price.lt' => 'The sales price must be less than price'
        ];
    }
}
