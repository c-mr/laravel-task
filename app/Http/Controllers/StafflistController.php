<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Staff;
use App\Http\Requests\StaffRequest;

class StafflistController extends Controller
{
    // 一覧取得
    public function list(){
        // $stafflist = Staff::all();
        $stafflist = Staff::orderBy('staff_no', 'desc')->get();

        $busho = \Config::get('original.busho');
        $sex = \Config::get('original.sex');
        return view("stafflist.list", compact("stafflist", "busho", "sex"));
    }
    //詳細取得
    public function show($id){
        $staff = Staff::findOrFail($id);
        return view("stafflist.show", compact("staff"));
    }
    // 詳細新規
    public function create(){
        return view("stafflist.register");
    }
    // DBへの書き込み
    public function store(StaffRequest $request) {
        Staff::create($request->all());
        return redirect("staff");
    }
    // 詳細編集
    public function edit($id){
        $staff = Staff::findOrFail($id);
        return view("stafflist.register", compact("staff"));
    }
    // DBへのアップデート
    public function update($id, StaffRequest $request){
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        return redirect(url("staff", [$staff->id]));
    }
    // DBからの物理削除
    public function destory($id){
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect("staff");
    }
}
