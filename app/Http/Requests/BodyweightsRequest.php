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
            'user_id' => 'required|numeric',
            // 同日、登録出来るのは1回のみ但し、自分以外の登録は除外
            'measure_at' => 'required|date|unique:bodyweights,measure_at,'.$this->id,
            'bodyweight' => 'required|numeric',
        ];
    }
}
