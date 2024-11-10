<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'condition_id' => 'required',
            'name' => ['required', 'max:40'],           
            'price' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーを選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'name.required' => '商品名を入力してください',
            'name.max:40' => '商品名は40文字以内で入力してください',
            'image.required' => '商品画像を選択してください',
            'price.required' => '金額を入力してください'
        ];
    }
}
