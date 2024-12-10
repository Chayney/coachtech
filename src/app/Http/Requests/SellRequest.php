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
            'elements' => 'required',
            'condition_id' => 'required',
            'name' => ['required', 'max:40'],           
            'price' => ['required', 'integer'],
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'elements.required' => 'カテゴリーを選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'name.required' => '商品名を入力してください',
            'name.max' => '商品名は40文字以内で入力してください',
            'image.required' => '商品画像を選択してください',
            'price.required' => '販売価格を入力してください',
            'price.integer' => '販売価格は数値で入力してください'
        ];
    }
}
