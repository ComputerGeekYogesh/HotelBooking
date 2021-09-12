<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoomtypeController extends Controller
{
    public function index()
    {
        $roomtype = RoomType::all();
        return view('admin.roomtype.index',compact('roomtype'));
    }


    public function store(Request $request){
        $roomtype = new RoomType();
        $roomtype->room_type = $request->input('roomtype');
        $roomtype->short_code = $request->input('shortcode');
        $roomtype->description = $request->input('description');
        $roomtype->price = $request->input('price');
        $roomtype->total_rooms = $request->input('totalroom');
        $status = $request->input('status');
        if($status == 'active')
        {
            $roomtype->status= 0;
        }
        elseif($status == 'inactive')
        {
            $roomtype->status= 1;
        }
        if ($request->hasfile('image') && $request->image != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
                $image = time() . '.' . $extension;
                $request->image->move(public_path('roomtypes'), $image);
                $path = url('roomtypes', $image);
                $roomtype->image = $path;
}
    $roomtype->save();
    Session::flash('statuscode','success');
    return redirect('roomtype')->with('status','Data Added Successfully');
}

    public function edit($id){
    $roomtype = RoomType::findOrFail($id);
    return view('admin.roomtype.edit',compact('roomtype'));
}


public function update(Request $request, $id){
    $roomtype =  Roomtype::find($id);
    $roomtype->room_type = $request->input('roomtype');
    $roomtype->short_code = $request->input('shortcode');
    $roomtype->description = $request->input('description');
    $roomtype->price = $request->input('price');
    $roomtype->total_rooms = $request->input('totalroom');
    $status = $request->input('status');
    if($status == 'active')
    {
        $roomtype->status= 0;
    }
    elseif($status == 'inactive')
    {
        $roomtype->status= 1;
    }
    if ($request->hasfile('image') && $request->image != null) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
            $image = time() . '.' . $extension;
            $request->image->move(public_path('roomtypes'), $image);
            $path = url('roomtypes', $image);
            $roomtype->image = $path;
}
  
  $roomtype-> update();
  Session::flash('statuscode','info');
  return redirect('roomtype')->with('status','Data Updated Successfully');
}

public function delete($id) {
    $roomtype = Roomtype::findorFail($id);
    $roomtype->delete();
    //Session::flash('statuscode','error');
    return response()->json(['status' => 'Data Deleted Successfully']);

}
}
