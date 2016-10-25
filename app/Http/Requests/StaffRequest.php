<?php
/*
FormRequestの作成
php artisan make:request StaffRequest
入力チェックのルールはここに記載
エラー画面へのリダイレクトもここで行われる。
*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            // 社員番号は必須項目・整数のみ・重複禁止・更新の際、自身はチェックしない
            "staff_no" => "required|integer|unique:staff,staff_no,".$this->id."'",
            // 名前は必須項目・最大の長さはDBと同じく200
            "name" => "required|max:200",
            // 部署は必須項目
            "department" => "required",
            // 性別は必須項目
            "sex" => "required",
        ];
    }
}
