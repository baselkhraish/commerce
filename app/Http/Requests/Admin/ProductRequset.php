<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequset extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required','string','min:3','max:255',
            ],
            'description'=>[
                'required','string','min:3','max:255',
            ],
            'price'=>'required',
            'sale_price'=>'nullable',
            'qty'=>'required',
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'يرجى إضافة اسم المنتج',
            'name.string'=>'يرجى ادخال اسم المنتج نص',
            'name.min'=>'اسم المنتج غير كافي',
            'name.max'=>'اسم المنتج طويل',

            'image.required'=>'يرجى إضافة صورة المنتج',

            'description.required'=>'يرجى إضافة وصف المنتج',
            'description.string'=>'يرجى ادخال وصف المنتج نص',
            'description.min'=>'وصف المنتج غير كافي',
            'description.max'=>'وصف المنتج طويل',

            'price.required'=>'يرجى إضافة سعر المنتج',
            'qty.required'=>'يرجى إضافة كمية المنتجات',
            'category_id.required'=>'يرجى إضافة قسم المنتج',
        ];
    }
}
