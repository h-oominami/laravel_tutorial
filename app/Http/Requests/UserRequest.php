<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/* 定数定義 */
define('MAX', 30);
define('MIN', 4);
/**/

class UserRequest extends FormRequest
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
     * バリデーションルール
     */
    public function rules()
    {
        return [
            'title' => 'required|max:MAX',
            'content' => 'required|min:MIN'
        ];
    }
}
