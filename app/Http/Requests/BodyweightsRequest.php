<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use DB;

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

        $user_id = \Auth::user()->id;

        /**
         * 自分自身のID以外では同じ日付があっても良いので
         *
         */
        // 自分自身のUSER_IDで同じ日があるかDBチェック
        $bodyweights_count = DB::table('bodyweights')
                    ->select(DB::raw('count(*) as count, measure_at'))
                    ->where('user_id', '=', $user_id)
                    ->where('measure_at', '=', $this->measure_at)
                    ->groupBy('measure_at')
                    ->get();

        // 新規登録かつ、同じ日登録が0件で無ければ入力チェックを追記
        $validation_measure_at = "";
        if ( count($bodyweights_count) != 0 ){
            $validation_measure_at = '|unique:bodyweights,measure_at,'.$this->id;
        }

        return [
            'user_id' => 'required|numeric',
            // 同日、登録出来るのは1回のみ但し、自分以外の登録は除外
            'measure_at' => 'required|date'.$validation_measure_at,
            'bodyweight' => 'required|numeric',
        ];
    }
}
