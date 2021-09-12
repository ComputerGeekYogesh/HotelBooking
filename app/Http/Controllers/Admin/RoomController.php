<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    public function index()
    {
        $room = Room::all();
        return view('admin.room.index',compact('room'));
    }


    public function store(Request $request){
        $room = new Room();
        $room->room_ = $request->input('room');
        $room->short_code = $request->input('shortcode');
        $room->description = $request->input('description');
        $room->price = $request->input('price');
        $room->total_rooms = $request->input('totalroom');
        $status = $request->input('status');
        if($status == 'active')
        {
            $room->status= 0;
        }
        elseif($status == 'inactive')
        {
            $room->status= 1;
        }
        if ($request->hasfile('image') && $request->image != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
                $image = time() . '.' . $extension;
                $request->image->move(public_path('rooms'), $image);
                $path = url('rooms', $image);
                $room->image = $path;
}
    $room->save();
    Session::flash('statuscode','success');
    return redirect('room')->with('status','Data Added Successfully');
}

    public function edit($id){
    $room = Room::findOrFail($id);
    return view('admin.room.edit',compact('room'));
}


public function update(Request $request, $id){
    $room =  Room::find($id);
    $room->room_ = $request->input('room');
    $room->short_code = $request->input('shortcode');
    $room->description = $request->input('description');
    $room->price = $request->input('price');
    $room->total_rooms = $request->input('totalroom');
    $status = $request->input('status');
    if($status == 'active')
    {
        $room->status= 0;
    }
    elseif($status == 'inactive')
    {
        $room->status= 1;
    }
    if ($request->hasfile('image') && $request->image != null) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
            $image = time() . '.' . $extension;
            $request->image->move(public_path('rooms'), $image);
            $path = url('rooms', $image);
            $room->image = $path;
}

  $room-> update();
  Session::flash('statuscode','info');
  return redirect('room')->with('status','Data Updated Successfully');
}

public function delete($id) {
    $room = Room::findorFail($id);
    $room->delete();
    //Session::flash('statuscode','error');
    return response()->json(['status' => 'Data Deleted Successfully']);

}
}
