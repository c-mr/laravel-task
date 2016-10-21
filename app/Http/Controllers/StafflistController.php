<?php
/*
php artisan make:controller tafflistController
でコントローラーを作成
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// モデル読込
use App\Staff;

// リクエスト読込
use App\Http\Requests\StaffRequest;

// DBクラスを使用する
use DB;

// Logクラスを使用する
use Log;

class StafflistController extends Controller
{
    // 一覧取得
    public function list(){
        // $stafflist = Staff::all();
        // DBから読み込み idで降順ソート
        $stafflist = Staff::orderBy('id', 'desc')->get();

        // 部署と性別の定義を読み込んでViewに渡す
        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        // 一覧を表示するViewテンプレートの指定と、値を渡す
        return view("stafflist.list", compact("stafflist", "department", "sex"));
    }

    //詳細取得
    public function show($id){
        // findOrFail→指定したIDを検索、見つからない場合は例外を投げます(エラー画面になる。)。
        $staff = Staff::findOrFail($id);

        // 部署と性別の定義を読み込んでViewに渡す
        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        // 詳細を表示するViewテンプレートの指定と、値を渡す
        return view("stafflist.show", compact("staff", "department", "sex"));
    }

    // 新規登録
    public function create(){
        // 部署と性別の定義を読み込んでViewに渡す
        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        // 新規登録・編集画面のViewテンプレートの指定
        return view("stafflist.register", compact("department", "sex"));
    }

    // DBへの書き込み
    // StaffRequestのクラスの実体(インスタンス)も取得：入力チェック
    public function store(StaffRequest $request) {

        // トランザクションの開始
        DB::beginTransaction();

        try {
            // StaffのDBにINSERTする。
            Staff::create($request->all());

            // トランザクション終了
            DB::commit();
        } catch (Exception $e) {
            // ログにエラー出力
            Log::error($e);

            // DBをロールバックする
            DB::rollback();
        }

        // StaffのDBにINSERTする。
        // Staff::create($request->all());

        // 新規登録完了したら一覧画面に戻る
        return redirect("staff");
    }

    // 詳細編集
    public function edit($id){
        // DBから指定のid行を取得
        $staff = Staff::findOrFail($id);

        // 部署と性別の定義を読み込んでViewに渡す
        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        // 新規登録・編集画面のViewテンプレートの指定とDBから取得した値、定義を送る
        return view("stafflist.register", compact("staff", "department", "sex"));
    }

    // DBへのアップデート
    // URLのID番号をRoutesからもらいつつ、入力チェックも：引数
    public function update($id, StaffRequest $request){
        // DBから指定のid行を取得
        $staff = Staff::findOrFail($id);

        // StaffのDBにUPDATEする
        $staff->update($request->all());

        // 更新した詳細ページにリダイレクト。
        return redirect(url("staff", [$staff->id]));
    }

    // DBからの削除
    public function destory($id){
        // DBから指定のid行を取得
        $staff = Staff::findOrFail($id);

        // StaffのDBからDELETEする
        $staff->delete();

        // 完了したら一覧画面に戻る
        return redirect("staff");
    }
}
