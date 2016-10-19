<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Staff;

class StafflistController extends Controller
{
    public function show($id)
    {
        // return view("stafflist.show");
        $staff = Staff::findOrFail($id);
        return view("stafflist.show", compact("staff"));
    }
}
