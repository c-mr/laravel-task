<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// モデル読込
use App\Bodyweights;

// リクエスト読込
use App\Http\Requests\BodyweightsRequest;

use DB;
use Log;


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

        // トランザクションの開始
        DB::beginTransaction();

        try {
            $bodyweight = Bodyweights::create($request->all());

            // 前日比の計算書き込み関数の呼出
            Bodyweights::diff($bodyweight->id, $bodyweight);

            // トランザクション終了
            DB::commit();

        } catch (Exception $e) {

            // ログにエラー出力
            Log::error($e);

            // DBをロールバックする
            DB::rollback();
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


        // 前回計測のデータを抽出する際に使用
        $user_id = \Auth::user()->id;
        $measure_at = Bodyweights::findOrFail($id)->measure_at;
        /**
        * SQL文例
        * select * from bodyweights Where user_id = 5 AND measure_at < '2016-10-27' order by measure_at DESC limit 1
        */
        $bodyweight_prev = Bodyweights::where('user_id', '=', $user_id)
                                        ->where('measure_at', '<', $measure_at)
                                        ->orderBy('measure_at', 'desc')
                                        ->limit('1')
                                        ->first();

        return view("bodyweights.detail", compact('bodyweight', 'bodyweight_prev'));
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
     * DBをアップデートする
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BodyweightsRequest $request, $id){

            $bodyweight = Bodyweights::findOrFail($id);

        // トランザクションの開始
        DB::beginTransaction();

        try {
            $bodyweight->update($request->all());

            // 前日比の計算書き込み関数の呼出
            Bodyweights::diff($id, $bodyweight);

            // トランザクション終了
            DB::commit();
        } catch (Exception $e) {
            // ログにエラー出力
            Log::error($e);

            // DBをロールバックする
            DB::rollback();
        }

        return redirect(url('bodyweights', $bodyweight->id));
    }

    /**
     * 削除(物理)
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
