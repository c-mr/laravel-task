<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// モデル読込
use App\Bodyweights;

// リクエスト読込
use App\Http\Requests\BodyweightsRequest;

use DB;

class BodyweightsController extends Controller{
    /**
     * インデックスのリスト画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // 自身のユーザーIDを取得
        $user_id = \Auth::user()->id;

        // 最新の記録が上に来るように測定日でソート
        $bodyweights = Bodyweights::where('user_id', '=', $user_id)->orderBy('measure_at', 'desc')->paginate(10);

        return view('bodyweights.index', compact('bodyweights' ));
    }

    /**
     * 新規作成
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('bodyweights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BodyweightsRequest $request){

        Bodyweights::create($request->all());

        // 先程インサートされたシリアルID取得
        $id = DB::getPdo()->lastInsertId();

        // 先程インサートされたデータを取得
        $bodyweights = Bodyweights::findOrFail($id);

        $user_id = \Auth::user()->id;

        // 前回の測定データが有れば取得
        $bodyweight_prev = Bodyweights::where('user_id', '=', $user_id)
                                        ->where('measure_at', '<', $bodyweights->measure_at)
                                        ->orderBy('measure_at', 'desc')
                                        ->limit('1')
                                        ->first();

        // 前回の測定データがあれば比較の計算をして保存する
        if ( !empty($bodyweight_prev) ) {

            $bodyweight_diff = $bodyweights->bodyweight - $bodyweight_prev->bodyweight;

            Bodyweights::where('id', $id)
                       ->update(['bodyweight_diff' => round($bodyweight_diff ,2)]);
        }


        return redirect('bodyweights');
    }

    /**
     * 詳細画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id){

        $bodyweight = Bodyweights::findOrFail($id);

        return view('bodyweights.detail', compact('bodyweight'));
    }

    /**
     * 詳細編集表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $bodyweight = Bodyweights::findOrFail($id);

        return view('bodyweights.edit', compact('bodyweight'));
    }

    /**
     * DBに更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BodyweightsRequest $request, $id){

        $bodyweight = Bodyweights::findOrFail($id);

        $bodyweight->update($request->all());

        return redirect(url('bodyweights', $bodyweight->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $bodyweight = Bodyweights::findOrFail($id);

        $bodyweight->delete();

        return redirect('bodyweights');
    }
}
