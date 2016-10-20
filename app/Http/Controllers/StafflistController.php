<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Staff;

class StafflistController extends Controller
{
    // 一覧取得
    public function list()
    {
        $stafflist = Staff::all();
        return view("stafflist.list", compact("stafflist"));
    }
    //詳細取得
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view("stafflist.show", compact("staff"));
    }
    public function create()
    {
        return view("stafflist.create");
    }
    // DBへの書き込み
    public function store()
    {
        $inputs = \Request::all();
        Staff::create($inputs);
        return redirect("staff");
    }
}