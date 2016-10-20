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
        return view("stafflist.list", compact("stafflist"));
    }
    //詳細取得
    public function show($id){
        $staff = Staff::findOrFail($id);
        return view("stafflist.show", compact("staff"));
    }
    // 詳細新規編集
    public function create(){
        return view("stafflist.create");
    }
    // DBへの書き込み
    public function store(StaffRequest $request){
        Staff::create($request::all());
        return redirect("staff");
    }
}
