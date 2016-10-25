<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BodyweightsRequest extends FormRequest{
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
            // 同日、登録出来るのは1回のみ
            'measure_at' => 'required|date|unique:bodyweights',
            'bodyweights' => 'required|numeric',
        ];
    }
}
