<?php

namespace App\Http\Controllers\Admin;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FloorController extends Controller
{
    public function index()
    {
        $floor = Floor::all();
        return view('admin.floor.index',compact('floor'));
    }


    public function store(Request $request){
        $floor = new Floor();
        $floor->floor_name = $request->input('floorname');
        $floor->floor_code = $request->input('floorcode');
        $floor->floor_description = $request->input('floor_description');
    $floor->save();
    Session::flash('statuscode','success');
    return redirect('floor')->with('status','Data Added Successfully');
}

    public function edit($id){
    $floor = floor::findOrFail($id);
    return view('admin.floor.edit',compact('floor'));
}


public function update(Request $request, $id){
    $floor =  floor::find($id);
    $floor->floor_name = $request->input('floorname');
    $floor->floor_code = $request->input('floorcode');
    $floor->floor_description = $request->input('floor_description');
  $floor-> update();
  Session::flash('statuscode','info');
  return redirect('floor')->with('status','Data Updated Successfully');
}

public function delete($id) {
    $floor = floor::findorFail($id);
    $floor->delete();
    return response()->json(['status' => 'Data Deleted Successfully']);

}
}
