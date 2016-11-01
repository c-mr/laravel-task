<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

// モデル読込
use App\User;

use DB;

// リクエスト読込
use App\Http\Requests\UserRequest;

use Log;

class AuthController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $user_id = \Auth::user()->id;

        if ($id == $user_id) {
            $user = User::findOrFail($id);
            return view('auth.edit', compact('user'));
        }else{
            abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id){

        $user = User::findOrFail($id);

        // トランザクションの開始
        DB::beginTransaction();

        try {

            User::where('id', $id)
                ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'bodyheight' => $request['bodyheight'],
                'bodyweight' => $request['bodyweight'],
            ]);

            // トランザクション終了
            DB::commit();
        } catch (Exception $e) {
            // ログにエラー出力
            Log::error($e);

            // DBをロールバックする
            DB::rollback();
        }
        return view('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $user = User::findOrFail($id);

        $user->delete();

        \Auth::logout();
        return view('index');
    }
}
