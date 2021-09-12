<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    public function index()
    {
        $guest = Guest::all();
        return view('admin.guest.index',compact('guest'));
    }


    public function store(Request $request){
        $guest = new Guest();
        $guest->f_name = $request->input('f_name');
        $guest->l_name = $request->input('l_name');
        $guest->email = $request->input('email');
        $guest->mobile_no = $request->input('mobile_no');
        $status = $request->input('status');
        if($status == 'active')
        {
            $guest->status= 0;
        }
        elseif($status == 'inactive')
        {
            $guest->status= 1;
        }
    $guest->save();
    Session::flash('statuscode','success');
    return redirect('guest')->with('status','Data Added Successfully');
}

    public function edit($id){
    $guest = Guest::findOrFail($id);
    return view('admin.guest.edit',compact('guest'));
}


public function update(Request $request, $id){
    $guest =  Guest::find($id);
    $guest->f_name = $request->input('f_name');
    $guest->l_name = $request->input('l_name');
    $guest->email = $request->input('email');
    $guest->mobile_no = $request->input('mobile_no');
    $status = $request->input('status');
    if($status == 'active')
    {
        $guest->status= 0;
    }
    elseif($status == 'inactive')
    {
        $guest->status= 1;
    }
  $guest-> update();
  Session::flash('statuscode','info');
  return redirect('guest')->with('status','Data Updated Successfully');
}

public function delete($id) {
    $guest = Guest::findorFail($id);
    $guest->delete();
    return response()->json(['status' => 'Data Deleted Successfully']);

}

}
