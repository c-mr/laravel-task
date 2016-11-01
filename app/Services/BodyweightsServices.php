<?php

namespace App\Services;

// モデル読込
use App\Bodyweights;

/**
*
*/
class BodyweightsServices{


    /**
     *
     * 前日比の計算(新規・更新時に使用)して保存する
     * @param  int　$id　新規・更新シリアルID
     * @param  $bodyweight　新規・更新でDBに保存したデータ
     * @return none
     */
    public static function diff($id, $bodyweight){

        $user_id = \Auth::user()->id;

        // 前回の測定データが有れば取得
        $bodyweight_prev = Bodyweights::where('user_id', '=', $user_id)
                                        ->where('measure_at', '<', $bodyweight->measure_at)
                                        ->orderBy('measure_at', 'desc')
                                        ->first();

        // 前回の測定データがあれば比較の計算をして保存する
        if (!empty($bodyweight_prev)) {

            $bodyweight_diff = floatval($bodyweight->bodyweight) - floatval($bodyweight_prev->bodyweight);

            Bodyweights::where('id', $id)
                        ->update(['bodyweight_diff' => $bodyweight_diff]);
        }

        // 次の測定データが有れば取得
        $bodyweight_next = Bodyweights::where('user_id', '=', $user_id)
                                        ->where('measure_at', '>', $bodyweight->measure_at)
                                        ->orderBy('measure_at', 'asc')
                                        ->first();

        // 次の測定データがあれば再度、比較の計算をして上書き保存
        if (!empty($bodyweight_next)) {

            $bodyweight_diff = floatval($bodyweight_next->bodyweight) - floatval($bodyweight->bodyweight);

            Bodyweights::where('id', $bodyweight_next->id)
                       ->update(['bodyweight_diff' => $bodyweight_diff]);
        }
    }

}