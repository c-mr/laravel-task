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
        $stafflist = Staff::orderBy('id', 'desc')->get();

        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        return view("stafflist.list", compact("stafflist", "department", "sex"));
    }

    //詳細取得
    public function show($id){
        $staff = Staff::findOrFail($id);

        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        return view("stafflist.show", compact("staff", "department", "sex"));
    }

    // 新規登録
    public function create(){
        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        return view("stafflist.register", compact("department", "sex"));
    }

    // DBへの書き込み
    public function store(StaffRequest $request) {
        Staff::create($request->all());

        return redirect("staff");
    }

    // 詳細編集
    public function edit($id){
        $staff = Staff::findOrFail($id);

        $department = \Config::get('staff_master.department');
        $sex = \Config::get('staff_master.sex');

        return view("stafflist.register", compact("staff", "department", "sex"));
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
