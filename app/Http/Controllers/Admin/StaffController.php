<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('admin.staff.index',compact('staff'));
    }


    public function store(Request $request){
        $staff = new Staff();
        $staff->f_name = $request->input('f_name');
        $staff->l_name = $request->input('l_name');
        $staff->user_name = $request->input('u_name');
        $staff->password = $request->input('password');
        $staff->email = $request->input('email');
        $staff->mobile_no = $request->input('mobile_no');

        $gender = $request->input('gender');
        if($gender == 'male')
        {
            $staff->gender = 0;
        }
        elseif($gender == 'female')
        {
            $staff->gender = 1;
        }
        elseif($gender == 'other')
        {
            $staff->gender = 2;
        }

        $staff->address = $request->input('address');

        if ($request->hasfile('image') && $request->image != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
                $image = time() . '.' . $extension;
                $request->image->move(public_path('staffs'), $image);
                $path = url('staffs', $image);
                $staff->image = $path;
        }

        $status = $request->input('status');
        if($status == 'active')
        {
            $staff->status= 0;
        }
        elseif($status == 'inactive')
        {
            $staff->status= 1;
        }

    $staff->save();
    Session::flash('statuscode','success');
    return redirect('staff')->with('status','Data Added Successfully');
}

    public function edit($id){
    $staff = staff::findOrFail($id);
    return view('admin.staff.edit',compact('staff'));
}


public function update(Request $request, $id){
    $staff =  staff::find($id);
    $staff->f_name = $request->input('f_name');
    $staff->l_name = $request->input('l_name');
    $staff->user_name = $request->input('u_name');
    $staff->password = $request->input('password');
    $staff->email = $request->input('email');
    $staff->mobile_no = $request->input('mobile_no');
    $staff->address = $request->input('address');


    $gender = $request->input('gender');
    if($gender == 'male')
    {
        $staff->gender= 0;
    }
    elseif($gender == 'female')
    {
        $staff->gender= 1;
    }
    elseif($gender == 'other')
    {
        $staff->gender= 2;
    }


    if ($request->hasfile('image') && $request->image != null) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
            $image = time() . '.' . $extension;
            $request->image->move(public_path('staffs'), $image);
            $path = url('staffs', $image);
            $staff->image = $path;
    }

    $status = $request->input('status');
    if($status == 'active')
    {
        $staff->status= 0;
    }
    elseif($status == 'inactive')
    {
        $staff->status= 1;
    }

  $staff-> update();
  Session::flash('statuscode','info');
  return redirect('staff')->with('status','Data Updated Successfully');
}

public function delete($id) {
    $staff = Staff::findorFail($id);
    $staff->delete();
    return response()->json(['status' => 'Data Deleted Successfully']);

}
}
